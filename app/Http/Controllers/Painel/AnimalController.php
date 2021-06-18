<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AnimalFormRequest;
use App\Animal;
use App\Lot;

class AnimalController extends Controller
{
  private $animal;
  public function __construct(Animal $animal){
    $this->animal = $animal;
      $this->middleware('auth');
  }
    public function index()
    {
      $results = $this->animal->orderBy('id','ASC')->get();
        return view('painel.animals.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $lots = Lot::all();
      //       if ($lots) {
      //         $notification = array(
      //                       'message' => 'Operação realizada com sucesso',
      //                       'alert-type' => 'success'
      //                     );
      //           return redirect()->route('painel.animals.create', compact('lots'))->with($notification);
      // }

      //dd($lots->id);
        return view('painel.animals.create', compact('lots'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalFormRequest $request)
    {

      //dd($request->all());
      $nameFile = null;


      $file = $request->file('image');
      if (!empty($file)) {

          //dd($file);
          $nameImage = uniqid(date('HisYmd'));
          $extension = $file->extension();
          $nameFile = "{$nameImage}.{$extension}";

          $imagem = 'uploads/';
          //$extensao = $extension;
//                $nome = $nameImage . '.' . $extensao;


          $insert = $this->animal->create([
            'earring' => $request->input('earring'),
            'record' => $request->input('record'),
            'name' => $request->input('name'),
            'lot_id' => $request->input('lot_id'),
            'birth_date' => $request->input('birth_date'),
            'breed' => $request->input('breed'),
            'blood_grade' => $request->input('blood_grade'),
            'sex' => $request->input('sex'),
            'origin' => $request->input('origin'),
            'date_of_last_delivery' => $request->input('date_of_last_delivery'),
            'value' => $request->input('value'),
            'weaning_date' => $request->input('weaning_date'),
            'mother_on_the_property' => $request->input('mother_on_the_property'),
            'father_on_the_property' => $request->input('father_on_the_property'),
            'image' =>  $imagem . $nameFile,
            'active' => $request->input('active'),
            'comments' => $request->input('comments'),
            'to_discard' => $request->input('to_discard'),
          ]);
          Storage::disk('uploads')->put($nameFile, file_get_contents($file));
        }
      else{
         $insert = $this->animal->create($request->all());
       }


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
