<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Reproduction;
use App\Animal;
use Illuminate\Http\Request;

class ReproductionController extends Controller
{
  private $reproduction;
  public function __construct(Reproduction $reproduction){
    $this->reproduction = $reproduction;
      $this->middleware('auth');
  }
    public function index()
    {
      $results = $this->reproduction->all();
      //dd($results);
        return view('painel.reproduction.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $animals = Animal::all();
             // alert()->error('Ocorreu um erro por favor tente novamente mais tarde!','Woops')->persistent('Fechar')->autoclose(1800);
        return view('painel.reproduction.create', compact('animals'));
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

      $insert = $this->reproduction->create([
        'animal_id'=>$request->input('animal_id'),
        'user_id'=>auth()->user()->id,
        'delivery_date'=>$request->input('delivery_date'),
        'coverage_date'=>$request->input('coverage_date'),
        'expected_delivery_date'=>$request->input('expected_delivery_date'),
        'dry_date'=>$request->input('dry_date'),
        'pre_delivery_date'=>$request->input('pre_delivery_date'),
        'del'=>$request->input('del'),
        'situation'=>$request->input('situation'),
        'observation1'=>$request->input('observation1'),
        'observation2'=>$request->input('observation2'),
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
    public function show($id)
    {
        //
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
        //
    }
}
