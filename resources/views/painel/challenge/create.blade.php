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
                                            {{-- @can('view', $value) --}}
                                            <option value="{{$value->id}}" {{old('type') == '{$value}' ? 'selected' : '' }}>{{$value->earring.' / '.$value->name}}</option>
                                            {{-- @endcan --}}
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
                                        <select class="{{ $errors->has('coefficient') ? 'form-control is-invalid' : 'form-control' }}" name="coefficient" id="coefficient">
                                            <option value="">Selecione</option>
                                            {{-- <option value="1.0">1,0</option>
                                            <option value="1.2">1,2</option>
                                            <option value="1.3">1,3</option>
                                            <option value="1.4">1,4</option>
                                            <option value="1.5">1,5</option>
                                            <option value="1.6">1,6</option>
                                            <option value="1.7">1,7</option> --}}
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
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Selecione o Insumo</label>
                                        <select name="stock_id" id="stock_id" class=" {{ $errors->has('stock_id') ? 'form-control is-invalid' : 'form-control' }}">
                                            <option value="">Selecione o Insumo</option>
                                            @foreach ($stocks as $value)
                                            {{-- @can('view', $value) --}}
                                            <option value="{{$value->id}}" {{old('type') == '{$value}' ? 'selected' : '' }}>{{$value->description}}</option>
                                            {{-- @endcan --}}
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="description">Descrição</label>
                                        <input class="{{ $errors->has('description') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('description')}}" name="description" id="description" type="text" placeholder="Descrição">


                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="amount_of_meals">Quantidade de refeições</label>
                        <select class="{{ $errors->has('amount_of_meals') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('amount_of_meals')}}" name="amount_of_meals" id="amount_of_meals">
                            @for ($i=1; $i < 6; $i++) <option value="{{$i}}">{{$i}}</option>
                                @endfor
                        </select>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="application">Aplicação por Animal ou lote</label>
                        <select class="{{ $errors->has('application') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('application')}}" name="application" id="application">
                            <option value="Animal">Animal</option>
                            <option value="Lote">Lote</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="number_of_animals">Número de animais</label>
                        <input class="{{ $errors->has('number_of_animals') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('number_of_animals')}}" name="number_of_animals" id="number_of_animals" type="text"
                          placeholder="Número de animais">


                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="total_amount">Quantidade por animal/lote kg</label>

                        <input class="{{ $errors->has('total_amount') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('total_amount')}}" name="total_amount" id="total_amount" type="text" placeholder="Quantidade por animal/lote kg"
                          readonly>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cost_price">Preço de custo</label>
                        <input class="{{ $errors->has('cost_price') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('cost_price')}}" name="cost_price" id="cost_price" type="text" placeholder="Preço de custo">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="subtotal">Sub Total</label>
                        <input class="{{ $errors->has('subtotal') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('subtotal')}}" name="subtotal" id="subtotal" type="text" placeholder="Sub Total" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="active">Ativo</label>
                        <select class="{{ $errors->has('active') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('active')}}" name="active" id="active">
                            <option value="Sim">Sim</option>
                            <option value="Não">Não</option>
                        </select>

                    </div>
                </div>
                <div class="col-md-3" style="display:none">
                    <div class="form-group">
                        <label for="projected_production">produção projetada</label>
                        <input class="{{ $errors->has('projected_production') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('projected_production')}}" name="projected_production" id="projected_production" type="text" placeholder="Sub Total" readonly>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="animal_id"]').on('change', function() {
            var animal_id = $(this).val();
            if (animal_id) {
                $.ajax({
                    url: '/painel/desafio_get/' + animal_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $("#total_production").val(data);

                    }
                });
            } else {
                $('select[name="city_id"]').empty();
                $('select[name="city_id"]').append('<option value=""> Selecione um Estado </option>');
            }
        });
    });
    $(document).ready(function() {
        $('select[name="stock_id"]').on('change', function() {
            var stock_id = $(this).val();
            if (stock_id) {
                $.ajax({
                    url: '/painel/stocks_get/' + stock_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        //console.log(data);
                        $("#cost_price").val(data);

                        var total_production = document.getElementById("total_production").value; //total de leite
                        var resultado = document.getElementById("resultado").value; //quantidade de raçao
                        var cost_price = document.getElementById("cost_price").value; //valor unitario da raçao
                        var production_projection = document.getElementById("production_projection").value; //producao projetada
                        var cost_price1 = parseFloat(cost_price.replace(',', '.'));
                        var calc = (resultado * cost_price).toFixed(2);

                        var production_projection1 = (((total_production * production_projection) / 100) +  total_production);


                        $("#projected_production").val(production_projection1);
                        $("#subtotal").val(calc);
                    }
                });
            } else {
                $('select[name="city_id"]').empty();
                $('select[name="city_id"]').append('<option value=""> Selecione um Estado </option>');
            }
        });
    });
</script>



<script>
    $('#coefficient').change(function() {
        var total_production = document.getElementById("total_production").value;
        var coefficient = document.getElementById("coefficient").value;

        //  console.log(total_production + '/' + coefficient);

        var total_production1 = parseFloat(total_production.replace(',', '.'));
        var coefficient1 = parseFloat(coefficient.replace(',', '.'));

        var calc = (total_production1 / coefficient1).toFixed(1);

        var x = Math.round(calc);

        document.getElementById('resultado').value = eval(x);
        document.getElementById('total_amount').value = eval(x);

    });

    // $(document).ready(function() {
    //     $('select[name="stock_id"]').on('change', function() {
    //
    //
    //         var resultado = document.getElementById("resultado").value; //valor unitario da raçao
    //         var cost_price = document.getElementById("cost_price").value; //valor unitario da raçao
    //
    //         //console.log(resultado);
    //         console.log(cost_price);
    //         var cost_price1 = parseFloat(cost_price.replace(',', '.'));
    //
    //         //var calc = (amount_of_meals1 * number_of_animals * total_amount * cost_price).toFixed(2);
    //         var calc = (resultado * cost_price).toFixed(2);
    //
    //         //console.log(resultado)
    //
    //         document.getElementById('subtotal').value = eval(calc);
    //
    //
    //     });
    // });
</script>
@stop
@include('sweet::alert')
@endsection
