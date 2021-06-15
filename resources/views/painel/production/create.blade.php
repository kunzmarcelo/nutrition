@extends('adminlte::page')
@section('title', 'Nova Produção | GPR Nutrition')

@section('css')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
    .label-float {
        position: relative;
        padding-top: 13px;
    }

    .label-float input {
        border: 1px solid lightgrey;
        border-radius: 5px;
        outline: none;
        min-width: 250px;
        padding: 15px 20px;
        font-size: 16px;
        transition: all .1s linear;
        -webkit-transition: all .1s linear;
        -moz-transition: all .1s linear;
        -webkit-appearance: none;
    }

    .label-float input:focus {
        border: 2px solid #084969;
    }

    .label-float input::placeholder {
        color: transparent;
    }

    .label-float label {
        pointer-events: none;
        position: absolute;
        top: calc(50% - 8px);
        left: 15px;
        transition: all .1s linear;
        -webkit-transition: all .1s linear;
        -moz-transition: all .1s linear;
        background-color: white;
        padding: 5px;
        box-sizing: border-box;
    }

    .label-float input:required:invalid+label {
        color: red;
    }

    .label-float input:focus:required:invalid {
        border: 2px solid red;
    }

    .label-float input:required:invalid+label:before {
        content: '*';
    }

    .label-float input:focus+label,
    .label-float input:not(:placeholder-shown)+label {
        font-size: 13px;
        top: 0;
        color: #084969;
    }
</style>
@stop
@section('content')
@include('sweet::alert')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cadatro</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Nova Produção</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">

    <div class="container-fluid">


        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-12">
                        <div class="p-5">


                            <form class="forms-sample" action="{{route('producao.store')}}" method="POST" enctype="multipart/form-data">

                                {{csrf_field()}}


                                <div class="form-group row">

                                    <div class="col-md-4">
                                        {{-- <input class="{{ $errors->has('date_milking') ? 'form-control is-invalid' : 'form-control' }} " value="2021-05-21" name="date_milking" id="date_milking" type="date" placeholder="data Ordenha"> --}}
                                        <input class="{{ $errors->has('date_milking') ? 'form-control is-invalid' : 'form-control' }} " value="<?php echo date('Y-m-d'); ?>" name="date_milking" id="date_milking" type="date" placeholder="data Ordenha">
                                    </div>

                                    <div class="col-md-8">
                                        <select name="animal_id" id="animal_id" class=" {{ $errors->has('animal_id') ? 'form-control is-invalid' : 'form-control' }}">
                                            <option value="">Selecione o animal</option>
                                            @foreach ($animals as $value)
                                            <option value="{{$value->id}}" {{old('type') == '{$value}' ? 'selected' : '' }}>{{$value->earring.' / '.$value->name}}</option>

                                            @endforeach


                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">

                                    <div class="col-md-2">
                                        <input class="{{ $errors->has('first_milking') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('first_milking')}}" name="first_milking" id="first_milking" type="number" min="0" max="60"
                                          placeholder="1° Ordenha">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="{{ $errors->has('second_milking') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('second_milking')}}" name="second_milking" id="second_milking" type="number" min="0" max="60"
                                          placeholder="2° Ordenha">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="{{ $errors->has('third_milking') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('third_milking')}}" name="third_milking" id="third_milking" type="number" min="0" max="60"
                                          placeholder="3° Ordenha">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="{{ $errors->has('single_milking') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('single_milking')}}" name="single_milking" id="single_milking" type="number" min="0" max="60"
                                          placeholder="Unica Ordenha">
                                    </div>
                                    <div class="col-md-4">
                                        {{-- <span id=""></span> --}}
                                        <input class="{{ $errors->has('total_milking') ? 'form-control is-invalid' : 'form-control' }} " readonly="readonly" value="{{old('total_milking')}}" name="total_milking" id="resultado" type="text"
                                          placeholder="Total de Litros">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <button type="submit" name="button" class="btn btn-block btn-outline-danger btn-lg" onClick="history.go(-1)">
                                            {{-- <span class="icon text-white-50">
                            <i class="fa fa-arrow-right"></i>
                          </span> --}}
                                            <span class="text">Voltar</span>

                                        </button>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" name="button" class="btn btn-block btn-outline-info btn-lg">
                                            {{-- <span class="icon text-white-50">
                            <i class="fa fa-arrow-right"></i>
                          </span> --}}
                                            <span class="text">Enviar</span>

                                        </button>
                                    </div>


                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>
@section('js')

<script>
    var first_milking = document.getElementById("first_milking");
    var second_milking = document.getElementById("second_milking");
    var third_milking = document.getElementById("third_milking");
    var single_milking = document.getElementById("single_milking");


    var total_milking = document.getElementById("total_milking");
    var somenteNumeros = new RegExp("[^0-9]", "g");

    $('#first_milking').on({
        click: function() {
            single_milking.setAttribute("disabled", true)

        }
    })
    $('#second_milking').on({
        click: function() {
            single_milking.setAttribute("disabled", true)

        }
    })
    $('#third_milking').on({
        click: function() {
            single_milking.setAttribute("disabled", true)

        }
    })
    $('#single_milking').on({
        click: function() {
            first_milking.setAttribute("disabled", true)
            second_milking.setAttribute("disabled", true)
            third_milking.setAttribute("disabled", true)

        }
    })


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
        var first_milking1 = toNumber(first_milking.value);
        var second_milking1 = toNumber(second_milking.value);
        var third_milking1 = toNumber(third_milking.value);
        var single_milking1 = toNumber(single_milking.value);
        var calc = first_milking1 + second_milking1 + third_milking1 + single_milking1
        document.getElementById('resultado').value = eval(calc);
    }

    first_milking.addEventListener("input", somenteNumeros);
    second_milking.addEventListener("input", somenteNumeros);
    third_milking.addEventListener("input", somenteNumeros);
    single_milking.addEventListener("input", somenteNumeros);

    first_milking.addEventListener("input", onInput);
    second_milking.addEventListener("input", onInput);
    third_milking.addEventListener("input", onInput);
    single_milking.addEventListener("input", onInput);


    onInput();
</script>
@jquery
@toastr_js
@toastr_render
@stop
@section('css')
@toastr_css
@stop
@endsection
