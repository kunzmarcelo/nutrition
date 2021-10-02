<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Animal;
use App\Delivery;
use App\Setting;
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


            $results = Delivery::totalMonthDelivery();
            $productionTotal = Delivery::productionTotalMonth();
            $checksetting = Setting::checkSetting();
            // if ($checksetting < 1){
            //   alert()->warning('Para um bom funcionamento defina essas configurações!','Configurações pendentes')->persistent('Fechar');
            //    //return back();
            // }
            $setting = Setting::where('user_id','=',auth()->user()->id)->first();
            //dd($setting);
            if($setting == null){
              $dataHoje = Carbon::now()->format('Y-m-d');
              $data_hoje = date('Y-m-d', strtotime("$dataHoje"));
            }else{
              $dataHoje = Carbon::now()->format('Y-m-d');
              $data_hoje = date('Y-m-d', strtotime("- $setting->voluntary_waiting_period days", strtotime("$dataHoje")));

            }
            //$animalsActive = Animal::where('date_of_last_delivery', '<=', $data_hoje )->where('user_id','=',auth()->user()->id)->count(); // verificar se o animal passou do Periodo voluntario de espera PEV;
            $animals_able_to_get_pregnant = Animal::where([
              ['active','=','Sim'],
              ['to_discard','=','Não'],
              ['date_of_last_delivery', '<=', $data_hoje],
              ['user_id','=',auth()->user()->id],
            ])->count(); // verificar se o animal passou do Periodo voluntario de espera PEV;

            $animals_producing = Animal::where('active','Sim')->where('user_id','=',auth()->user()->id)->count(); // verificar se o animal passou do Periodo voluntario de espera PEV;
            $animalsTotal = Animal::where('user_id','=',auth()->user()->id)->count();

            $mediaDel = Reproduction::where('user_id','=',auth()->user()->id)->avg('del');

            // $production = Production::where('user_id','=',auth()->user()->id)->orderBy('date_milking','ASC')->get();

            $coverageDiagnosisP = Coverage::where('diagnosis','=','Prenha')->where('user_id','=',auth()->user()->id)->count();
            $coverageDiagnosisF = Coverage::where('diagnosis','=','Falha')->where('user_id','=',auth()->user()->id)->count();
            $coverageDiagnosisN = Coverage::where('diagnosis','=','Não Diagnosticado')->where('user_id','=',auth()->user()->id)->count();

            $concepcao = Coverage::where('diagnosis','!=','Falha')->where('user_id','=',auth()->user()->id)->count();
            $vacas_inseminadas = Coverage::all()->where('user_id','=',auth()->user()->id)->count();

//dd($concepcao);
            if($animals_able_to_get_pregnant != 0){
                $servico = number_format(($vacas_inseminadas / $animals_able_to_get_pregnant) *100,1); //TS (%) =  Número Vacas Inseminadas / Número Vacas Aptas
                //$servico =  number_format(($vacas_inseminadas * 100) / $animals_able_to_get_pregnant, 2); //TS (%) =  Número Vacas Inseminadas / Número Vacas Aptas
            }else {
              $servico = '';
            }
            if($servico != 0){
                $concepcao = number_format(($coverageDiagnosisP / ($vacas_inseminadas)*100),1); // TAXA DE CONCEPÇÃO = Número de prenhes confirmado / Número de animais inseminados
                  $prenhez = number_format(($coverageDiagnosisP * $animals_able_to_get_pregnant ),1); //Taxa de prenhez = Nº de animais prenhes / Nº de animais aptos
            }else{
                $servico = 0;
                $concepcao = 0;
                $prenhez = 0;
            }

             // dd($prenhez);

         $production = Animal::with('productions')->where('user_id','=',auth()->user()->id)
                    ->whereHas('Productions')->get();


        return response(view('home',compact(
                                            'results',
                                            'animals_able_to_get_pregnant',
                                            'animals_producing',
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
                                            'prenhez',
                                            'checksetting'
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
