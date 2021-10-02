<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoverageFormRequest;
use App\Setting;
use App\Procedure;
use App\Animal;
use App\Coverage;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CoverageController extends Controller
{
  private $coverage;
  public function __construct(Coverage $coverage){
    $this->coverage = $coverage;
      $this->middleware('auth');
  }
    public function index()
    {
      $setting = Setting::where('user_id','=',auth()->user()->id)->first();

      $animalsCoverage = $this->coverage->where('diagnosis', '=','falha')
                                ->where('user_id','=',auth()->user()->id);

//dd($animalsCoverage);

      $results = $this->coverage->where('user_id','=',auth()->user()->id)->get();
      //dd($results);
      return view('painel.coverage.index', compact('results'));
    }

     public function changeDiagnostic(Request $request){

      // dd($request);

       // $coverage = Coverage::findOrFail($request->user_id);
       // $coverage->diagnosis = $request->status;
       $update = Coverage::where('id', $request->id)->where('user_id','=',auth()->user()->id)->update(['diagnosis' => $request->status]);

       return response()->json(['message' => 'User status updated successfully.']);

     }
    public function create()
    {
      $setting = Setting::where('user_id','=',auth()->user()->id)->first();

      $dataHoje = Carbon::now()->format('Y-m-d');
      $data_hoje = date('Y-m-d', strtotime("- $setting->voluntary_waiting_period days", strtotime("$dataHoje")));


      //$animals = DB::select('SELECT * FROM animals WHERE ');

      //$animals = Animal::whereBetween($data_hoje , 'date_of_last_delivery' )->where('user_id','=',auth()->user()->id)->get(); // verificar se o animal passou do Periodo voluntario de espera PEV
      $animals = Animal::where([
          ['active','=','Sim'],
          ['to_discard','=','Não'],
          ['date_of_last_delivery', '<=', $data_hoje],
          ['user_id','=',auth()->user()->id],
        ])->get(); // verificar se o animal passou do Periodo voluntario de espera PEV
      //$animals = Animal::where('user_id','=',auth()->user()->id)->get();



      $employees = Employee::where('user_id','=',auth()->user()->id)->get();
      $setting = Setting::where('user_id','=',auth()->user()->id)->first();
        return view('painel.coverage.create',compact('animals','employees','setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoverageFormRequest $request)
    {
      $all = $request->all();
// dd($all);

      $setting = Setting::where('user_id','=',auth()->user()->id)->first();
      $insemination_date = $request->input('insemination_date');

 //print_r($setting->pregnancy_confirmation);
      $date_next_heat = Carbon::parse($insemination_date)->addDays($setting->pregnancy_confirmation);
//dd($date_next_heat);

      $date_touch = Carbon::parse( $insemination_date)->addDays($setting->released_for_ultrasound);
      $dry_date = Carbon::parse( $insemination_date)->addDays($setting->dry_animal);
      $transition_date = Carbon::parse( $insemination_date)->addDays($setting->pre_delivery);
      $delivery_date = Carbon::parse( $insemination_date)->addDays($setting->animal_birth);


      $date1 = Carbon::parse($request->input('last_birth'));
      $date2 = Carbon::parse($request->input('delivery_date'));
      // dd($date2);
       $value = $date1->diffInDays($date2);
       $iep = number_format(($value / $setting->average_day_of_the_month),2);
      //dd($iep);
      //dd(Carbon::parse($request->input('delivery_date'));

      //strtotime($data_final) - strtotime($data_inicial);
      $diferenca = strtotime(Carbon::now()) - strtotime($request->input('last_birth'));
      $del = floor($diferenca / (60 * 60 * 24));

      // $del = Carbon::now()->diffInDays($delivery_date);
 //dd($del);

// testar se essse animal já esta cadastrado ou prenha


        // $consulta = $this->coverage->where('diagnosis',$request->input('diagnosis'))->where('user_id','=',auth()->user()->id);
        //
        // dd($consulta);




      $insert = $this->coverage->create([
              "animal_id" => $request->input('animal_id'),
              "last_birth" => $request->input('last_birth'),
              "type" => $request->input('type'),
              "insemination_date" => $request->input('insemination_date'),
              "diagnosis" => $request->input('diagnosis'),
              "date_next_heat" =>   $date_next_heat,
              "date_touch" => $date_touch,
              "dry_date" => $dry_date,
              "transition_date" =>   $transition_date,
              "delivery_date" => $delivery_date,
              "iep" => $iep,
              "del" => $del,
              "insinuating" => $request->input('insinuating'),
              "detail" => $request->input('detail'),
              "user_id" => auth()->user()->id,
      ]);

        $last_birth = $request->input('last_birth');
        $value = Carbon::parse( $last_birth)->addDays($setting->voluntary_waiting_period);
        $dados =  Animal::find($request->input('animal_id'));
        $dados->date_of_last_delivery = $request->input('last_birth');
        $dados->able_to_get_pregnant = $value;
        $dados->save();
      //$update =

      if ($insert) {
        alert()->success('Registro inserido!','Sucesso')->persistent('Fechar')->autoclose(1800);
                 return redirect()->back();
             }
             alert()->error('Ocorreu um erro por favor tente novamente mais tarde!','Woops')->persistent('Fechar')->autoclose(1800);
             return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($status)
    {
      //dd($status);
        if($status =='nao-diagnosticado'){
          $status = 'Não Diagnosticado';
        }

        $results = $this->coverage->where('diagnosis', 'LIKE' ,'%'.$status.'%')->where('user_id','=',auth()->user()->id)->get();
        return view('painel.coverage.status', compact('results'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $dado = $this->coverage->find($id);

        $detele = $dado->delete();


      if ($detele){
        return response()->json([
                'success' => 'Registro deletado com sucesso!'
            ]);
          }else{
            return response()->json([
                    'success' => 'Ocorreu um erro por favor tente novamente mais tarde!'
                ]);
          }
    }

    public function getLastDelivery($id){
      $date_of_last_delivery = Animal::where('id',$id)
                              ->where('user_id','=',auth()->user()->id)
                               ->pluck('date_of_last_delivery');

                              //dd($producao);

      return json_encode($date_of_last_delivery);
    }


    public function getLastCoverage($id){
      $setting = Setting::where('user_id','=',auth()->user()->id)->first();

      $dataHoje = Carbon::now()->format('Y-m-d');
      $data_hoje = date('Y-m-d', strtotime("- $setting->pregnancy_confirmation days", strtotime("$dataHoje")));


      // $not_fit = DB::select("SELECT * FROM coverages WHERE coverages.user_id = 6 AND diagnosis != 'Prenha' AND insemination_date <= $data_hoje")->get();


    $not_fit = $this->coverage
    ->where('user_id','=',auth()->user()->id)
        ->where('animal_id','=',$id)
        ->where('diagnosis','!=','Prenha')
        ->where('insemination_date','<=',$data_hoje)->count();

         // ->toSql();

         if ($not_fit >= 0){

           return response()->json([
             'warning' => "esse animal não pode . $not_fit"
               ]);
             }else{
               return response()->json([
                 'warning' => "esse pode . $not_fit"
                   ]);
             }

      //return json_encode($not_fit);
    }
}
