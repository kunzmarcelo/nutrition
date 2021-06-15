@extends('adminlte::page')
@section('title', 'Nutrition')

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
                <h1>Cadastro</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Nova Reprodução</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>




<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">


                        <div class="card-body">
                            <form class="forms-sample" action="{{route('reproducao.store')}}" method="POST" enctype="multipart/form-data">
                              {{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Selecione o animal</label>
                                            <select name="animal_id" id="animal_id" class=" {{ $errors->has('animal_id') ? 'form-control is-invalid' : 'form-control' }}">
                                                <option value="">Selecione o animal</option>
                                                @foreach ($animals as $value)
                                                <option value="{{$value->id}}" {{old('type') == '{$value}' ? 'selected' : '' }}>{{$value->earring.' / '.$value->name}}</option>

                                                @endforeach


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Data do Parto</label>
                                            <input class="{{ $errors->has('delivery_date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('delivery_date')}}" name="delivery_date" id="delivery_date" type="date"
                                              placeholder="Data do Parto">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Previsão de Cobertura</label>
                                            <input class="{{ $errors->has('coverage_date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('coverage_date')}}" name="coverage_date" id="coverage_date" type="date"
                                              placeholder="Previsão de Cobertura">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Data Previsão de Parto</label>
                                            <input class="{{ $errors->has('expected_delivery_date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('expected_delivery_date')}}" name="expected_delivery_date" id="expected_delivery_date"
                                              type="date" readonly placeholder="Data Previsão de Parto">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Data Previsão de Secar</label>
                                            <input class="{{ $errors->has('dry_date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('dry_date')}}" name="dry_date" id="dry_date" type="date" placeholder="Data Previsão de Secar"
                                              readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Data previsão de pré parto</label>
                                            <input class="{{ $errors->has('pre_delivery_date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('pre_delivery_date')}}" name="pre_delivery_date" id="pre_delivery_date" type="date"
                                              placeholder="Data previsão de pré parto" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Dias em Lactação (DEL)</label>
                                            <input class="{{ $errors->has('del') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('del')}}" name="del" id="del" type="text" placeholder="Dias em Lactação (DEL)" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Situação</label>
                                            <input class="{{ $errors->has('situation') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('situation')}}" name="situation" id="situation" type="text" placeholder="Situação">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>1° observação</label>
                                            <input class="{{ $errors->has('observation1') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('observation1')}}" name="observation1" id="observation1" type="text" placeholder="1° observação">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>2° observação</label>
                                            <input class="{{ $errors->has('observation2') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('observation2')}}" name="observation2" id="observation2" type="text" placeholder="2° observação">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <button type="submit" name="button" class="btn btn-outline-info btn-lg  float-right">Enviar</button>
                                    <button type="submit" name="button" class="btn btn-outline-danger btn-lg" onClick="history.go(-1)">Voltar</button>

                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->

                </div>

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@section('js')

<script>
    $(document).ready(function() {
        $("#coverage_date").on("change", function() {
            var date = new Date($("#coverage_date").val()),
                days = parseInt($("#days").val(), 10);

            if (!isNaN(date.getTime())) {
                date.setDate(date.getDate() + 280);
                //2012-12-17
                $('#expected_delivery_date')[0].valueAsDate = date;
                //$("#expected_delivery_date").val(date.toInputFormat());
            } else {
              sweetAlert({
                title: 'Woops!',
                    text: 'Informe a data de previsão de cobertura corretamente!',
                    icon: 'error',
                    showCancelButton: true,
                    cancelButtonText: 'Fechar',
                    autoclose: 1800,
              });
                $("#coverage_date").focus();
            }
        });

        Date.prototype.toInputFormat = function() {
            var yyyy = this.getFullYear().toString();
            var mm = (this.getMonth() + 1).toString();
            var dd = this.getDate().toString();
            return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]);
        };
    });

    $(document).ready(function() {
        $("#coverage_date").on("change", function() {
            var date = new Date($("#coverage_date").val()),
                days = parseInt($("#days").val(), 10);

            if (!isNaN(date.getTime())) {
                date.setDate((date.getDate() + 280) - 60);
                //2012-12-17
                $('#dry_date')[0].valueAsDate = date;
                //$("#expected_delivery_date").val(date.toInputFormat());
            } else {
              sweetAlert({
                title: 'Woops!',
                    text: 'Informe a data de previsão de cobertura corretamente!',
                    icon: 'error',
                    showCancelButton: true,
                    cancelButtonText: 'Fechar',
                    autoclose: 1800,
              });
                $("#coverage_date").focus();
            }
        });

        Date.prototype.toInputFormat = function() {
            var yyyy = this.getFullYear().toString();
            var mm = (this.getMonth() + 1).toString();
            var dd = this.getDate().toString();
            return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]);
        };
    });
    $(document).ready(function() {
        $("#coverage_date").on("change", function() {
            var date = new Date($("#coverage_date").val()),
                days = parseInt($("#days").val(), 10);

            if (!isNaN(date.getTime())) {
                date.setDate((date.getDate() + 280) - 21);
                //2012-12-17
                $('#pre_delivery_date')[0].valueAsDate = date;
                //$("#expected_delivery_date").val(date.toInputFormat());
            } else {
              sweetAlert({
                title: 'Woops!',
                    text: 'Informe a data de previsão de cobertura corretamente!',
                    icon: 'error',
                    showCancelButton: true,
                    cancelButtonText: 'Fechar',
                    autoclose: 1800,
              });
                $("#coverage_date").focus();
            }
        });

        Date.prototype.toInputFormat = function() {
            var yyyy = this.getFullYear().toString();
            var mm = (this.getMonth() + 1).toString();
            var dd = this.getDate().toString();
            return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]);
        };
    });


    $(document).ready(function() {
        $("#delivery_date").on("change", function() {
            data1 = new Date($("#delivery_date").val());
            data2 = new Date();
            var resultado = (data2 - data1) / (1000 * 3600 * 24);
            document.getElementById('del').value = eval(resultado.toFixed(0));

        });
    });
</script>

@stop
@endsection
