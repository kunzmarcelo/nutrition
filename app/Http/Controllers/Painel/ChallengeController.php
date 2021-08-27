<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Production;
use App\Stock;
use App\Animal;
use App\Challenge;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ChallengeController extends Controller
{
  private $challenge;
  public function __construct(Challenge $challenge){
    $this->challenge = $challenge;
      $this->middleware('auth');
  }
    public function index()
    {
      $results = $this->challenge->where('user_id','=',auth()->user()->id)->get();
      return view('painel.challenge.index', compact('results'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animals = Animal::where('user_id','=',auth()->user()->id)->get();
        $stocks = Stock::where('user_id','=',auth()->user()->id)->get();
        return view('painel.challenge.create', compact('animals','stocks'));
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
       //dd($all);

      $insert = $this->challenge->create($all);

      if ($insert) {
        alert()->success('Registro inserido!','Sucesso')->persistent('Fechar')->autoclose(1800);
                 return redirect()->back();
             }
             alert()->error('Ocorreu um erro por favor tente novamente mais tarde!','Woops')->persistent('Fechar')->autoclose(1800);
             return back();
    }

    public function closeDay()
    {
      $results = $this->challenge->where('user_id','=',auth()->user()->id)
              ->orderBy('start_date')
              ->get()
              ->groupBy(function ($val) {
                  return Carbon::parse($val->start_date)->format('d-m-Y');
              });


        return view('painel.challenge.indexgroup', compact('results'));
    }

    public function show($date)
    {
// dd($date);
        $date = $date;
        $total_animals = Animal::where('active','sim')
                         ->where('user_id','=',auth()->user()->id)
                         ->count();

        $total_ration = $this->challenge
                         ->where('start_date','=',Carbon::parse($date)->format('Y-m-d'))
                         ->where('user_id','=',auth()->user()->id)
                         ->sum('result');

        $total_production = $this->challenge
                         ->where('start_date','=',Carbon::parse($date)->format('Y-m-d'))
                         ->where('user_id','=',auth()->user()->id)
                         ->sum('total_production');

        $projected_production = $this->challenge
                         ->where('start_date','=',Carbon::parse($date)->format('Y-m-d'))
                         ->where('user_id','=',auth()->user()->id)
                         ->sum('projected_production');

        $iterable = $this->challenge
                       ->where('start_date','=',Carbon::parse($date)->format('Y-m-d'))
                       ->where('user_id','=',auth()->user()->id)->get();


        $current_average =  number_format($total_production / $total_animals,2,',','');      // media atual;
        $estimative = $projected_production - $total_production;
        $total_ration_month = $total_ration * 30;
// dd($iterable);
     return view('painel.challenge.closeday', compact(
                                                    'iterable',
                                                    'date',
                                                    'total_ration',
                                                    'total_production',
                                                    'projected_production',
                                                    'total_animals',
                                                    'total_ration_month',
                                                    'estimative',
                                                    'current_average')
                                                  );
    }

    public function downloadPDF($date){
      $date = $date;
      $total_animals = Animal::where('active','sim')
                       ->where('user_id','=',auth()->user()->id)
                       ->count();

      $total_ration = $this->challenge
                       ->where('start_date','=',Carbon::parse($date)->format('Y-m-d'))
                       ->where('user_id','=',auth()->user()->id)
                       ->sum('result');

      $total_production = $this->challenge
                       ->where('start_date','=',Carbon::parse($date)->format('Y-m-d'))
                       ->where('user_id','=',auth()->user()->id)
                       ->sum('total_production');

      $projected_production = $this->challenge
                       ->where('start_date','=',Carbon::parse($date)->format('Y-m-d'))
                       ->where('user_id','=',auth()->user()->id)
                       ->sum('projected_production');

      $iterable = $this->challenge
                     ->where('start_date','=',Carbon::parse($date)->format('Y-m-d'))
                     ->where('user_id','=',auth()->user()->id)->get();


      $current_average =  number_format($total_production / $total_animals,2,',','');      // media atual;
      $estimative = $projected_production - $total_production;
      $total_ration_month = $total_ration * 30;
           return \PDF::loadView('painel.challenge.downloadPDF', compact('iterable',
                                                               'date',
                                                               'total_ration',
                                                               'total_production',
                                                               'projected_production',
                                                               'total_animals',
                                                               'total_ration_month',
                                                               'estimative',
                                                               'current_average'))
                      //->setPaper('a4', 'landscape')
                      ->setPaper('a4', 'portrait')
                       ->download("desafio.pdf");

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
      $dado = $this->challenge->find($id);

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

    public function getProducao($id){
      $producao = Production::where('animal_id',$id)
                              ->where('user_id','=',auth()->user()->id)
                              ->pluck('total_milking');

                              //dd($producao);

      return json_encode($producao);
    }

    public function getStock($id){
      $stock = Stock::where('id',$id)
                              ->where('user_id','=',auth()->user()->id)
                              ->pluck('price');


                              //dd($producao);

      return json_encode($stock);
    }

}
