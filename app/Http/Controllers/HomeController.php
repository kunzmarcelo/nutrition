<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Delivery;
use App\Production;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Carbon\Carbon;
class HomeController extends Controller
{
  private $delivery;
  public function __construct(Delivery $delivery){
    $this->delivery = $delivery;
      $this->middleware('auth');
  }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $now = Carbon::now()->format('m');

      // /$results = $this->delivery->whereMonth('collection_date', '=', $now)->get();
      $results = $this->delivery->whereMonth('collection_date', '=', $now)->get();

      $animalsActive = Animal::where('active','=','sim')->count();
      $animalsTotal = Animal::count();
      $productionTotal = Delivery::whereMonth('collection_date', '=', $now)->sum('total_liters_produced');
      //dd($animalsActive);
        return view('home',compact('results','animalsActive','animalsTotal','productionTotal'));
    }
}
