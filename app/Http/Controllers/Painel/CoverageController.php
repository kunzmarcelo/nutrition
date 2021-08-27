<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Setting;
use App\Procedure;
use App\Animal;
use App\Coverage;
use App\Employee;
use Illuminate\Http\Request;
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
      $animals = Animal::where('user_id','=',auth()->user()->id)->get();
      $procedures = Procedure::where('user_id','=',auth()->user()->id)->get();
      $employees = Employee::where('user_id','=',auth()->user()->id)->get();
      $setting = Setting::where('user_id','=',auth()->user()->id)->first();
        return view('painel.coverage.create',compact('animals','procedures','employees','setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
       $del = Carbon::now()->diffInDays($delivery_date);
// dd($del);


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
}
