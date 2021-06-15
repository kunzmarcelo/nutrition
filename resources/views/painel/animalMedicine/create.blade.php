@extends('adminlte::page')
@section('title', 'Nutrition')

@section('css')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                    <li class="breadcrumb-item active">Nova Medição</li>
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


                            <form class="forms-sample form-signin" action="{{route('aplicacoes.store')}}" method="POST" enctype="multipart/form-data">

                                {{csrf_field()}}



                                <div class="form-group row">
                                    <div class="col-md-4">
                                        {{-- <span class="has-float-label"> --}}
                                        <select name="medicine_id" id="medicine_id" class=" {{ $errors->has('medicine_id') ? 'form-control custom-select is-invalid' : 'form-control custom-select' }}">
                                            {{-- <option value="">Selecione a Medição</option> --}}
                                            @foreach ($medicines as $value)
                                            <option value="{{$value->id}}" {{old('type') == '{$value}' ? 'selected' : '' }}>{{$value->description}}</option>
                                            @endforeach
                                        </select>
                                        {{-- <label>Selecione a Medição</label> --}}
                                        </span>
                                    </div>
                                    <div class="col-md-4 floating-label">
                                        {{-- <span class="has-float-label"> --}}
                                        {{-- <input class="{{ $errors->has('date_milking') ? 'form-control is-invalid' : 'form-control' }} " value="2021-05-21" name="date_milking" id="date_milking" type="date" placeholder="data Ordenha"> --}}
                                        <input class="{{ $errors->has('application_date') ? 'form-control is-invalid' : 'form-control' }} " value="<?php echo date('Y-m-d'); ?>" name="application_date" id="application_date" type="date"
                                          placeholder="Data de Aplicação">
                                        <label for="application_date">Data de aplicação</label>
                                        {{-- </span> --}}
                                    </div>
                                    <div class="col-md-4 floating-label">
                                        {{-- <span class="has-float-label"> --}}
                                        {{-- <input class="{{ $errors->has('date_milking') ? 'form-control is-invalid' : 'form-control' }} " value="2021-05-21" name="date_milking" id="date_milking" type="date" placeholder="data Ordenha"> --}}
                                        <input readonly="readonly" class="{{ $errors->has('next_application') ? 'form-control is-invalid' : 'form-control' }} " value="" name="next_application" id="next_application" type="date"
                                          placeholder="Data de Aplicação">
                                        <label for="next_application">Próxima aplicacao</label>
                                        {{-- </span> --}}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    @foreach ($animals as $value)
                                    <div class="col-md-3 mb-3">
                                        <input type="checkbox" name="animals_id[]" value="{{$value->id}}" data-toggle="toggle" data-on="Sim" data-off="Não" data-onstyle="outline-success" data-offstyle="outline-danger" data-size="sm"> {{$value->earring.' / '.$value->name}}
                                    </div>
                                    @endforeach
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
    $('#application_date')[0].valueAsDate = new Date();

    $('#application_date').change(function() {
        var date = this.valueAsDate;
        date.setDate(date.getDate() + 15);
        $('#next_application')[0].valueAsDate = date;
    });

    $('#application_date').change();
</script>

@stop

@endsection
