@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
<script src="https://code.highcharts.com/highcharts.js"></script>
@stop


@section('content')
  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Dashboard</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
              </div>
          </div>
      </div><!-- /.container-fluid -->
  </section>
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-horse-head"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Animais Produzindos</span>
                        <span class="info-box-number">
                            {{$animalsActive}}
                            <small>animais</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-horse-head"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total de Animais</span>
                        <span class="info-box-number">
                            {{$animalsTotal}}
                            <small>animais</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Litros Produzidos</span>
                        <span class="info-box-number">{{$productionTotal}}
                        <small>litros</small>
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-hand-holding-medical"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">DEL</span>
                        <span class="info-box-number">{{$mediaDel}}<small>média</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            {{-- <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">New Members</span>
                        <span class="info-box-number">2,000</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div> --}}
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Relatório de produção mensal</h5>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">


                                <div class="chart">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <!-- Sales Chart Canvas -->
                                    <div id="container"></div>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                    {{-- <div class="card-footer">
                          <div class="row">
                              <div class="col-sm-3 col-6">
                                  <div class="description-block border-right">
                                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                                      <h5 class="description-header">$35,210.43</h5>
                                      <span class="description-text">TOTAL REVENUE</span>
                                  </div>
                                  <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-3 col-6">
                                  <div class="description-block border-right">
                                      <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                                      <h5 class="description-header">$10,390.90</h5>
                                      <span class="description-text">TOTAL COST</span>
                                  </div>
                                  <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-3 col-6">
                                  <div class="description-block border-right">
                                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                                      <h5 class="description-header">$24,813.53</h5>
                                      <span class="description-text">TOTAL PROFIT</span>
                                  </div>
                                  <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-3 col-6">
                                  <div class="description-block">
                                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                                      <h5 class="description-header">1200</h5>
                                      <span class="description-text">GOAL COMPLETIONS</span>
                                  </div>
                                  <!-- /.description-block -->
                              </div>
                          </div>
                          <!-- /.row -->
                      </div> --}}
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
    <!-- /.row -->

</section>


@stop


@section('js')
  <script>


      Highcharts.chart('container', {
          title: {
              text: 'Total por Entregas'
          },
          subtitle: {
                      text: 'Quantidade do mês atual'
                  },
           xAxis: {
              categories: [
                @foreach ($results as $value)
                '{{Carbon::parse($value->collection_date)->format("d/m/Y")}}',
                @endforeach
            ]
          },
          yAxis: {
              title: {
                  text: 'Litros por entrega'
              }
          },
          legend: {
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'middle'
          },
          plotOptions: {
              series: {
                  allowPointSelect: true
              }
          },
          series: [{
              name: 'Litros',
              data: [
                @foreach ($results as $value)
                    {{$value->total_liters_produced.','}}
                    @endforeach
                  ],
                  pointStart: 0
          }],
          responsive: {
              rules: [{
                  condition: {
                      maxWidth: 500
                  },
                  chartOptions: {
                      legend: {
                          layout: 'horizontal',
                          align: 'center',
                          verticalAlign: 'bottom'
                      }
                  }
              }]
          }
  });


  </script>


{{-- <script src="{{asset('vendor/jquery/jquery.js')}}"></script> --}}
@stop
