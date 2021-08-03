<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>


</head>

<body>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <img src="{{url('vendor/adminlte/dist/img/farms_nutrition.png')}}" style="height:70px; width: 70px">
                                    Farms Nutrition
                                    <small class="float-right">Realizado em: {{Carbon::parse($date)->format('d/m/Y')}}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->


                        <div class="row">
                            <div class="col-9">
                                <h4>
                                    Desafio de produção

                                </h4>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                    <tr>
                                      <th>Animal</th>
                                      <th>Litros</th>
                                      <th>Resultado</th>
                                      <th>Projeção</th>
                                      
                                      <th>Estimativa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($iterable as $result)

                                  <tr>
                                    <td>{{$result->animal->earring.' / '. $result->animal->name }}</td>
                                        <td>{{$result->total_production .'lts'}}</td>
                                      <td>{{$result->result .' kg/dia'}}</td>
                                      <td>{{$result->production_projection .' %'}}</td>
                                      
                                      <td>{{($result->production_projection * $result->total_production) / 100 + $result->total_production.'lts'}} <i class="fas fa-chart-line"></i> </td>

                                    
                                  </tr>


                                  @endforeach

                                </tbody>
                            </table>
                            
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Quantidade de leite: <strong>{{$total_production }} lts/dia</strong></p>
                             <p>Total de animais lactantes: <strong>{{$total_animals }} animais</strong></p>
                            
                            <p>Média atual: <strong>{{number_format($total_production / $total_animals,2,',','') }} lts/dia</strong></p>
                            <p>Estimativa de aumento em: <strong>{{$total_production - $production_projection }} Litros dia</strong></p>
                            <hr>
                             <p>Total de ração dia: <strong>{{$total_ration }} Kg/dia</strong></p>
                            <p>Total de ração mês: <strong>{{$total_ration * 30 }} Kg/dia</strong></p>
                           
                            {{--<p>Média estimada: <strong>{{$total_production / $total_animals }} lts/dia</strong></p>--}}
                            
                        </div> 
                    </div>


                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

</body>

</html>
