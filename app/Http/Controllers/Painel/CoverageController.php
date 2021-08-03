<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Procedure;
use App\Animal;
use App\Coverage;
use App\Employee;
use Illuminate\Http\Request;

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
        return view('painel.coverage.create',compact('animals','procedures','employees'));
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

      $insert = $this->coverage->create($all);

      if ($insert) {
        alert()->success('Registro inserido!','Sucesso')->persistent('Fechar')->autoclose(1800);
                 return redirect()->back();
             }
             alert()->error('Ocorreu um erro por favor tente novamente mais tarde!','Woops')->persistent('Fechar')->autoclose(1800);
             return back();

/*


       $animals = $request->input('animals_id');

       //dd($animals);
      // $animals = $request->input('animals_id');
      // $animals = $request->input('animals_id');


        if ( $animals ) {
            foreach ( $animals as $id) {


                $type=  $request->input('type');
                $date=  $request->input('date');
                $diagnosis = $request->input('diagnosis');
                $detail = $request->input('detail');
                $user_id=  $request->input('user_id');


                $insert = $this->coverage->create([
                    'animal_id' => $id,
                    'type' => $type,
                    'date' => $date,
                    'diagnosis' => $diagnosis,
                    'insinuating' =>$request->input('insinuating') ,
                    'detail' => $detail,
                    'user_id' => $user_id,
                  ]);
              }
              if ($insert) {
                alert()->success('Registro inserido!','Sucesso')->persistent('Fechar')->autoclose(1800);
                         return redirect()->back();
                     }
                     alert()->error('Ocorreu um erro por favor tente novamente mais tarde!','Woops')->persistent('Fechar')->autoclose(1800);
                     return back();
          }
          */

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
