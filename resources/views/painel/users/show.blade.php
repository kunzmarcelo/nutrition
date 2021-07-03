@extends('adminlte::page')
@section('title', 'Farms Nutrition')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>


@stop
@include('sweet::alert')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Perfil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">{{$iterable->name}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            {{-- <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"> --}}
                        </div>

                        <h3 class="profile-username text-center">{{$iterable->name}}</h3>

                        <p class="text-muted text-center">{{$iterable->level}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Animais</b> <a class="float-right">{{$animalsTotal}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Media DEL</b> <a class="float-right">{{$mediaDel}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Produção mês atual</b> <a class="float-right">{{$production_current_month}} lts</a>
                            </li>
                            <li class="list-group-item">
                                <b>Produção último mês</b> <a class="float-right">{{$production_last_month}} lts</a>
                            </li>
                            <li class="list-group-item">
                                <b>Produção ultimo 3 mêses</b> <a class="float-right">{{$production_last_3_months}} lts</a>
                            </li>
                            <li class="list-group-item">
                                <b>Ativo no Sistema</b>

                                <input type="checkbox" name="status" data-id="{{ $iterable->id }}" data-toggle="toggle" data-on="Sim" data-off="Não" data-onstyle="outline-success" data-offstyle="outline-danger" data-size="sm" class="js-switch" {{ $iterable->status == 'sim' ? 'checked' : '' }}>

                                {{-- <input type="checkbox" data-id="{{ $iterable->id }}" name="status" class="js-switch float-right" {{ $iterable->status == 'sim' ? 'checked' : '' }}> --}}
                            </li>
                        </ul>
                        {{-- @if ($iterable->status == 'sim')
                              <a href="#" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                  <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text">Finalizado</span>
                              </a>
                              @else
                              <button type="button" name="status" class=" btn btn-warning btn-icon-split status">
                                <span class="icon text-white-50">
                                  <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text">Marcar como Finalizado?</span>
                              </button>

                              @endif --}}



                        {{-- <input type="checkbox" class="custom-control-input" id="user-{{$iterable->id}}" {{($iterable->status) ? 'checked' : ''}} onclick="changeUserStatus(event.target, {{ $iterable->id }});"> --}}

                        {{-- <button class="btn btn-primary btn-block mybtn-{{$iterable->id}}" rel="{{ $iterable->id }}" rel2="1">
                        Active
                        </button> --}}
                        {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sobre</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>

                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        <p class="text-muted">Malibu, California</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                        <p class="text-muted">
                            <span class="tag tag-danger">UI Design</span>
                            <span class="tag tag-success">Coding</span>
                            <span class="tag tag-info">Javascript</span>
                            <span class="tag tag-warning">PHP</span>
                            <span class="tag tag-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- About Me Box -->

                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">

                            <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">


                            <div class="active tab-pane" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@section('js')

{{-- <script>
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function(html) {
        let switchery = new Switchery(html, {
            size: 'small'
        });
    });
</script> --}}

<script type="text/javascript">

    $(document).ready(function() {
        $('.js-switch').change(function() {
            let status = $(this).prop('checked') === true ? 'sim' : 'não';
            let userId = $(this).data('id');
            validUrl = '{{url("/painel/changeStatus")}}';
            $.ajax({
                type: "GET",
                dataType: "json",
                url: validUrl,
                data: {
                    'status': status,
                    'user_id': userId
                },
                success: function() {
                  swal({
                      title: "Sucesso!",
                      text: "Registro alterado com sucesso",
                      type: "success",
                      timer: 1500,
                  });
                  document.location.reload(true);
                }
            });
        });
    });

</script>
<script>
    $(document).ready(function() {
        $('.data-table').dataTable();
    });
</script>

@stop
@endsection
