@extends('adminlte::page')
@section('title', 'Novo Animal | GPR Nutrition')

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
                    <li class="breadcrumb-item active">Novo Animal</li>
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


                            <form class="forms-sample" action="{{route('animais.store')}}" method="POST" enctype="multipart/form-data">

                                {{csrf_field()}}


                                <div class="form-group row">

                                    <div class="col-md-3">
                                        <input class="{{ $errors->has('earring') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('earring')}}" name="earring" id="earring" type="text" placeholder="Numero do Brinco*">
                                    </div>
                                    <div class="col-md-3">
                                        <input class="{{ $errors->has('record') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('record')}}" name="record" id="record" type="text" placeholder="Numero de registro">
                                    </div>
                                    <div class="col-md-3">
                                        <input class="{{ $errors->has('name') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('name')}}" name="name" id="name" type="text" placeholder="Nome do Animal*">
                                    </div>
                                    <div class="col-md-3">
                                        <select name="lot_id" id="lot_id" class=" {{ $errors->has('lot_id') ? 'form-control is-invalid' : 'form-control' }}">

                                            @foreach ($lots as $value)


                                            <option value="{{$value->id}}" {{old('type') == '{$value}' ? 'selected' : '' }}>{{$value->name}}</option>

                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <input class="{{ $errors->has('birth_date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('birth_date')}}" name="birth_date" id="birth_date" type="date" placeholder="data nascimento">
                                    </div>
                                    <div class="col-md-3">
                                        <select class="{{ $errors->has('breed') ? 'form-control is-invalid' : 'form-control' }} " name="breed" id="breed">
                                            <option value="Holandês preto e branco">Holandes preto e branco</option>
                                            <option value="Girolando">Girolando</option>
                                            <option value="Gir leiteiro">Gir leiteiro</option>
                                            <option value="Jersey">jersey</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Ayrshire">Ayrshire</option>
                                            <option value="Caracu">Caracu</option>
                                            <option value="Simetal">Simetal</option>
                                            <option value="Mestiça">Mestiça</option>
                                            <option value="Pardo Suíça (schwyz)">Pardo Suíça (schwyz)</option>
                                            <option value="Jersolando">Jersolando</option>
                                            <option value="Nelore">Nelore</option>
                                            <option value="Angus">Angus</option>
                                            <option value="Red Angus">Red Angus</option>
                                            <option value="Aberdeen Angus">Aberdeen Angus</option>
                                            <option value="Hereford">Hereford</option>
                                            <option value="Tabapuã">Tabapuã</option>
                                            <option value="Senepol">Senepol</option>
                                            <option value="Brahman">Brahman</option>
                                            <option value="Kiwi">Kiwi</option>
                                            <option value="Guzerá">Guzerá</option>
                                            <option value="Guzolando">Guzolando</option>
                                            <option value="F1">F1</option>
                                            <option value="S1">S1</option>
                                            <option value="Desconhecida">Desconhecida</option>
                                            <option value="Brangus">Brangus</option>
                                            <option value="Cruzamento Industrial">Cruzamento Industrial</option>
                                            <option value="Murrah">Murrah</option>
                                            <option value="Jafarabadi">Jafarabadi</option>
                                            <option value="Purunã">Purunã</option>
                                            <option value="Pardo Alpina">Pardo Alpina</option>
                                            <option value="Saanem">Saanem</option>
                                            <option value="Santa InêsGir">Santa InêsGir</option>
                                            <option value="White Dorper">White Dorper</option>
                                            <option value="Black Dorper">Black Dorper</option>
                                            <option value="Poll Dorset">Poll Dorset</option>
                                            <option value="Tricoss">Tricoss</option>
                                            <option value="Holandês Vermelho">Holandês Vermelho</option>
                                            <option value="Braford">Braford</option>
                                            <option value="Norueguês Vermelho">Norueguês Vermelho</option>
                                            <option value="Outra">Outra</option>
                                            <option value="Montbeliard">Montbeliard</option>
                                            <option value="Charolês">Charolês</option>
                                            <option value="Normando">Normando</option>
                                            <option value="Composto">Composto</option>
                                            <option value="Zebuíno">Zebuíno</option>
                                            <option value="Tabolanda">Tabolanda</option>
                                            <option value="Guzerá leiteiroSindi">Guzerá leiteiroSindi</option>
                                            <option value="Sindolando">Sindolando</option>
                                            <option value="Nelorando">Nelorando</option>
                                            <option value="Sinjer">Sinjer</option>
                                            <option value="Nelore Pintado">Nelore Pintado</option>
                                            <option value="Canchim">Canchim</option>
                                            <option value="Saanen">Saanen</option>
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <select class="{{ $errors->has('blood_grade') ? 'form-control is-invalid' : 'form-control' }} " name="blood_grade" id="blood_grade">
                                            <option value="Desconhecido">Desconhecido</option>
                                            <option value="1/8">1/8</option>
                                            <option value="1/4">1/4</option>
                                            <option value="3/8">3/8</option>
                                            <option value="7/16">7/16</option>
                                            <option value="1/2">1/2</option>
                                            <option value="9/16">9/16</option>
                                            <option value="5/8">5/8</option>
                                            <option value="11/16">11/16</option>
                                            <option value="3/4">3/4</option>
                                            <option value="13/16">13/16</option>
                                            <option value="7/8">7/8</option>
                                            <option value="15/16">15/16</option>
                                            <option value="31/32">31/32</option>
                                            <option value="PC">PC</option>
                                            <option value="PCOD">PCOD</option>
                                            <option value="PCOC">PCOC</option>
                                            <option value="PO">PO</option>
                                            <option value="LA">LA</option>
                                            <option value="CG">CG</option>
                                            <option value="63/34">63/34</option>
                                            <option value="127/128">127/128</option>
                                            <option value="255/256">255/256</option>
                                            <option value="GC-01">GC-01</option>
                                            <option value="GC-02">GC-02</option>
                                            <option value="GC-03">GC-03</option>
                                            <option value="GC-04">GC-04</option>
                                            <option value="GC-05">GC-05</option>
                                            <option value="GC-06">GC-06</option>
                                            <option value="GC-07">GC-07</option>
                                            <option value="17/32">17/32</option>
                                            <option value="23/32">23/32</option>
                                            <option value="25/32">25/32</option>
                                            <option value="41/64">41/64</option>
                                            <option value="57/64">57/64</option>
                                            <option value="1023/1024">1023/1024</option>
                                            <option value="63/37">63/37</option>
                                            <option value="50/50">50/50</option>
                                            <option value="75/25">75/25</option>
                                            <option value="88/12">88/12</option>
                                            <option value="81/19">81/19</option>
                                            <option value="62/37">62/37</option>
                                            <option value="56/44">56/44</option>
                                            <option value="56/43">56/43</option>
                                            <option value="72/28">72/28</option>
                                            <option value="25/25">25/25</option>
                                            <option value="31/18">31/18</option>
                                            <option value="69/31">69/31</option>
                                            <option value="PS">PS</option>
                                            <option value="CEIP">CEIP</option>
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <select class="{{ $errors->has('sex') ? 'form-control is-invalid' : 'form-control' }} " name="sex">
                                            <option value="Femea">Femea</option>
                                            <option value="Macho">Macho</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <select class="{{ $errors->has('origin') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('origin')}}" name="origin" id="origin">
                                            <option value="Nascimento">Nascimento</option>
                                            <option value="Compra">Compra</option>
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <input class="{{ $errors->has('date_of_last_delivery') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('date_of_last_delivery')}}" name="date_of_last_delivery" id="date_of_last_delivery"
                                          type="date" placeholder="Data do Ultimo parto">
                                    </div>
                                    <div class="col-md-3">
                                        <input class="{{ $errors->has('value') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('value')}}" name="value" id="value" type="text" placeholder="Valor">
                                    </div>
                                    <div class="col-md-3">
                                        <input class="{{ $errors->has('weaning_date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('weaning_date')}}" name="weaning_date" id="weaning_date" type="date" placeholder="data do demame">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <select class="{{ $errors->has('mother_on_the_property') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('mother_on_the_property')}}" name="mother_on_the_property" id="mother_on_the_property">
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="{{ $errors->has('father_on_the_property') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('father_on_the_property')}}" name="father_on_the_property" id="father_on_the_property">
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <input class="{{ $errors->has('image') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('image')}}" name="image" id="image" type="file" placeholder="imagem">
                                    </div>
                                    <div class="col-md-3">
                                        <select class="{{ $errors->has('active') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('active')}}" name="active" id="active">
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <textarea placeholder="Observações" class="{{ $errors->has('comments') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('comments')}}" name="comments" id="comments" rows="4"
                                          cols="80">{{old('comments')}}</textarea>

                                    </div>
                                    <div class="col-md-3">
                                        <select class="{{ $errors->has('to_discard') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('to_discard')}}" name="to_discard" id="to_discard">
                                            <option value="Não">Não</option>
                                            <option value="Sim">Sim</option>
                                        </select>

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
@jquery
@toastr_js
@toastr_render
@stop
@section('css')
  @toastr_css
@stop
@endsection
