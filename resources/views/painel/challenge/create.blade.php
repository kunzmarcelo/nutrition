@extends('adminlte::page')
@section('title', 'Farms Nutrition')

@section('css')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@stop
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cadastro</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Novo Desafio</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-body">
                        <form class="forms-sample" action="{{route('desafio.store')}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}">

                            <div class=" row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Data de Inicio</label>
                                        {{-- <input class="{{ $errors->has('date_milking') ? 'form-control is-invalid' : 'form-control' }} " value="2021-05-21" name="date_milking" id="date_milking" type="date" placeholder="data Ordenha"> --}}
                                        <input class="{{ $errors->has('start_date') ? 'form-control is-invalid' : 'form-control' }} " value="<?php echo date('Y-m-d'); ?>" name="start_date" id="start_date" type="date" placeholder="data de inicio">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tempo de duração do desafio</label>

                                        <input class="{{ $errors->has('analysis_time') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('analysis_time')}}" name="analysis_time" id="analysis_time" type="date"
                                          placeholder="Tempo de duração do desafio">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Selecione o animal</label>
                                        <select name="animal_id" id="animal_id" class=" {{ $errors->has('animal_id') ? 'form-control is-invalid' : 'form-control' }}">
                                            <option value="">Selecione o animal</option>
                                            @foreach ($animals as $value)
                                            @can('view', $value)
                                            <option value="{{$value->id}}" {{old('type') == '{$value}' ? 'selected' : '' }}>{{$value->earring.' / '.$value->name}}</option>
                                            @endcan
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Produção total do dia</label>
                                        <input class="{{ $errors->has('total_production') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('total_production')}}" name="total_production" id="total_production" type="text" min="0" max="60"
                                          placeholder="Produção total do dia">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Coeficiente</label>
                                        {{-- <input class="{{ $errors->has('coefficient') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('coefficient')}}" name="coefficient" id="coefficient" type="text"
                                        placeholder="Resultado em kg de ração"> --}}
                                        <select class="{{ $errors->has('coefficient') ? 'form-control is-invalid' : 'form-control' }}" name="coefficient" id="coefficient">
                                            <option value="">Selecione</option>
                                            <option value="1.0">1,0</option>
                                            <option value="1.2">1,2</option>
                                            <option value="1.3">1,3</option>
                                            <option value="1.4">1,4</option>
                                            <option value="1.5">1,5</option>
                                            <option value="1.6">1,6</option>
                                            <option value="1.7">1,7</option>
                                            <option value="1.8">1,8</option>
                                            <option value="1.9">1,9</option>
                                            <option value="2.0">2,0</option>
                                            <option value="2.1">2,1</option>
                                            <option value="2.2">2,2</option>
                                            <option value="2.3">2,3</option>
                                            <option value="2.4">2,4</option>
                                            <option value="2.5">2,5</option>
                                            <option value="2.6">2,6</option>
                                            <option value="2.7">2,7</option>
                                            <option value="2,8">2,8</option>
                                            <option value="2.9">2,9</option>
                                            <option value="3.0">3,0</option>
                                            <option value="3.1">3,1</option>
                                            <option value="3.2">3,2</option>
                                            <option value="3.3">3,3</option>
                                            <option value="3.4">3,4</option>
                                            <option value="3.5">3,5</option>
                                            <option value="3.6">3,6</option>
                                            <option value="3.7">3,7</option>
                                            <option value="3.8">3,8</option>
                                            <option value="3.9">3,9</option>
                                            <option value="4.0">4,0</option>
                                            <option value="4.1">4,1</option>
                                            <option value="4.2">4,2</option>
                                            <option value="4.3">4,3</option>
                                            <option value="4.4">4,4</option>
                                            <option value="4.5">4,5</option>
                                            <option value="4.6">4,6</option>
                                            <option value="4.7">4,7</option>
                                            <option value="4.8">4,8</option>
                                            <option value="4.9">4,9</option>
                                            <option value="5.0">5,0</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Resultado em kg de ração</label>
                                        <input class="{{ $errors->has('result') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('result')}}" name="result" id="resultado" type="text" readonly="readonly"
                                          placeholder="Resultado em kg de ração">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Projeção de produção em %</label>
                                        <input class="{{ $errors->has('production_projection') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('production_projection')}}" name="production_projection" id="production_projection"
                                          type="number" min="0" max="60" placeholder="Projeção de produção em %">
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer ">
                                <button type="submit" name="button" class="btn btn-outline-info btn-lg  float-right">Enviar</button>
                                <button type="reset" name="button" class="btn btn-outline-danger btn-lg" onClick="history.go(-1)">Voltar</button>

                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>


    </div><!-- /.container-fluid -->
</section>
@section('js')

<script>
    $('#coefficient').change(function() {
        var total_production = document.getElementById("total_production").value;
        var coefficient = document.getElementById("coefficient").value;

        //  console.log(total_production + '/' + coefficient);

        var total_production1 = parseFloat(total_production.replace(',', '.'));
        var coefficient1 = parseFloat(coefficient.replace(',', '.'));

        var calc = (total_production1 / coefficient1).toFixed(2);

        document.getElementById('resultado').value = eval(calc);

        // document.write('Número 1: <b>' + total_production1 + '</b><br />');
        // document.write('Número 2: <b>' + coefficient1 + '</b><br />');
        // document.write('Soma: <b>' + (total_production1 / coefficient1).toFixed(2) + '</b><brs />');
    });
    /*
                var total_production = document.getElementById("total_production");
                var coefficient = document.getElementById("coefficient");
                var result = document.getElementById("result");

                var somenteNumeros = new RegExp("[^0-9]", "g");

                var toNumber = function(value) {
                    var number = value.replace(somenteNumeros, "");
                    number = parseInt(number);
                    if (isNaN(number))
                        number = 0;
                    return number;
                }

                var somenteNumeros = function(event) {
                    event.target.value = toNumber(event.target.value);
                }

                var onInput = function(event) {
                    var total_production1 = toNumber(total_production.value);
                    var coefficient1 = toNumber(coefficient.value);
                    var teste = coefficient1;

                    var a = parseFloat(teste.replace(',', '.'));

                    var calc = total_production1 / a;
                    document.getElementById('resultado').value = eval(calc);
                }

                total_production.addEventListener("input", somenteNumeros);
                // coefficient.addEventListener("input", somenteNumeros);



                total_production.addEventListener("input", onInput);
                // coefficient.addEventListener("input", onInput);




                onInput();
                *
                */
</script>
@stop
@include('sweet::alert')
@endsection
