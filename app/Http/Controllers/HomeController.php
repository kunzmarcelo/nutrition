<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Animal;
use App\Delivery;
use App\Coverage;
use App\Production;
use App\Reproduction;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Carbon\Carbon;
class HomeController extends Controller
{

  public function __construct(){

//dd(Gate::denies('admin'));

        $this->middleware('auth');
  }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      if( Auth::user()->level  == 'admin' && Auth::user()->status == 'sim') {
            $now = Carbon::now()->format('m');

            // /$results = $this->delivery->whereMonth('collection_date', '=', $now)->get();
            $results = Delivery::whereMonth('collection_date', '=', $now)->get();

            $animalsActive = Animal::where('active','=','sim')->count();
            $animalsTotal = Animal::count();
            $productionTotal = Delivery::whereMonth('collection_date', '=', $now)->sum('total_liters_produced');
            $mediaDel = Reproduction::avg('del');
            $production = Animal::with('productions')->where('user_id','=',auth()->user()->id)
                       ->whereHas('Productions')->get();
            return view('home',compact('results','animalsActive','animalsTotal','productionTotal','mediaDel','production'));


        }else{
          if( Auth::user()->level  == 'produtor' && Auth::user()->status == 'sim') {
            $now = Carbon::now()->format('m');

            // /$results = $this->delivery->whereMonth('collection_date', '=', $now)->get();
            $results = Delivery::where('user_id','=',auth()->user()->id)->orderBy('collection_date','ASC')->get();
            //$results = Delivery::whereMonth('collection_date', '=', $now)->where('user_id','=',auth()->user()->id)->get();

            $animalsActive = Animal::where('active','=','sim')->where('user_id','=',auth()->user()->id)->count();
            $animalsTotal = Animal::where('user_id','=',auth()->user()->id)->count();
            $productionTotal = Delivery::whereMonth('collection_date', '=', $now)->where('user_id','=',auth()->user()->id)->sum('total_liters_produced');
            $mediaDel = Reproduction::where('user_id','=',auth()->user()->id)->avg('del');

            $production = Production::where('user_id','=',auth()->user()->id)->orderBy('date_milking','ASC')->get();

            $coverageDiagnosisP = Coverage::where('diagnosis','=','Prenha')->where('user_id','=',auth()->user()->id)->count();
            $coverageDiagnosisF = Coverage::where('diagnosis','=','Falha')->where('user_id','=',auth()->user()->id)->count();
            $coverageDiagnosisN = Coverage::where('diagnosis','=','Não Diagnosticado')->where('user_id','=',auth()->user()->id)->count();

            $concepcao = Coverage::where('diagnosis','!=','Falha')->where('user_id','=',auth()->user()->id)->count();
            $vacas_inseminadas = Coverage::all()->where('user_id','=',auth()->user()->id)->count();


            $servico = number_format(($vacas_inseminadas * 100) / $animalsActive, 2);
              if($servico != 0){
                  $concepcao = number_format(($coverageDiagnosisP * 100) / $servico, 2);
                  $prenhez = number_format($coverageDiagnosisP / $animalsActive, 2);
          }else{
            $servico = '';
            $concepcao = '';
            $prenhez = '';
          }

            // dd($concepcao);

         $production = Animal::with('productions')->where('user_id','=',auth()->user()->id)
                    ->whereHas('Productions')->get();


        return response(view('home',compact(
                                            'results',
                                            'animalsActive',
                                            'animalsTotal',
                                            'productionTotal',
                                            'mediaDel',
                                            'production',
                                            'coverageDiagnosisP',
                                            'coverageDiagnosisF',
                                            'coverageDiagnosisN',
                                            'concepcao',
                                            'servico',
                                            'vacas_inseminadas',
                                            'concepcao',
                                            'prenhez'
                                          ),array('production'=>$production)),200);

              // return view('home',compact('results','animalsActive','animalsTotal','productionTotal','mediaDel','production'));
          }
          else{
            abort(401, 'Something went wrong');
          }
      }




        // if(Gate::denies('produtor')){
        //
        //     $now = Carbon::now()->format('m');
        //
        //     // /$results = $this->delivery->whereMonth('collection_date', '=', $now)->get();
        //     $results = $this->delivery->where('user_id','=',auth()->user()->id)->whereMonth('collection_date', '=', $now)->get();
        //
        //     $animalsActive = Animal::where('active','=','sim')->where('user_id','=',auth()->user()->id)->count();
        //     $animalsTotal = Animal::where('user_id','=',auth()->user()->id)->count();
        //     $productionTotal = Delivery::whereMonth('collection_date', '=', $now)->where('user_id','=',auth()->user()->id)->sum('total_liters_produced');
        //
        //       return view('home',compact('results','animalsActive','animalsTotal','productionTotal'));
        //     }
    }
}
