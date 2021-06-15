@extends('adminlte::page')
@section('title', 'Novo Lote | GPR Nutrition')
@section('css')
    @toastr_css

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
  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Cadatro</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                      <li class="breadcrumb-item active">Novo Lote</li>
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
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Novo Lote</h1>
                            </div>

                            <form class="forms-sample" action="{{route('lote.store')}}" method="POST" enctype="multipart/form-data">

                                {{csrf_field()}}


                                <div class="form-group row">

                                    <div class="col-md-4">
                                        <input class="{{ $errors->has('name') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('name')}}" name="name" id="name" type="text" placeholder="Nome do Lote*">
                                        <span>
                                            {{-- <label for="name">Nome do Lote*</label> --}}
                                        </span>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="{{ $errors->has('phase') ? 'form-control is-invalid' : 'form-control' }} " name="phase">
                                            <option value='Vacas em Lactação'>Vacas em Lactação</option>
                                            <option value='Bezerros(as) até 6 meses'>Bezerros(as) até 6 meses</option>
                                            <option value='Bezerros(as) de 7 até meses'>Bezerros(as) de 7 até meses</option>
                                            <option value='Novilhos(as) acima de 12 meses'>Novilhos(as) acima de 12 meses</option>
                                            <option value='Novilhas prenhas'>Novilhas prenhas</option>
                                            <option value='Vacas Seca'>Vacas Seca</option>
                                            <option value='Enfermaria'>Enfermaria</option>
                                            <option value='Touros'>Touros</option>
                                            <option value='Engorda'>Engorda</option>
                                            <option value='Pré-Parto'>Pré-Parto</option>
                                        </select>


                                    </div>


                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <input class="{{ $errors->has('description') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('description')}}" name="description" id="description" type="text" placeholder="Descrição">
                                        <span>
                                            {{-- <label for="name">Nome do Lote*</label> --}}
                                        </span>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="color" id="color" name="color" value="#FFFFFF" class="{{ $errors->has('color') ? 'form-control is-invalid' : 'form-control' }} ">
                                        <label for="head">Cor do lote</label>


                                    </div>


                                </div>




                                <div class="form-group row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <button type="submit" name="button" class="btn btn-block btn-outline-danger btn-lg">
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
@jquery
@toastr_js
@toastr_render
@stop

@endsection
