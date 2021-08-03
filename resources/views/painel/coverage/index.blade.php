@extends('adminlte::page')
@section('title', 'Farms Nutrition')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>


@stop
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Listagem</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Cobertura</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-12">
                <div class="form-group row">
                    <div class="col-md-8"></div>

                    <div class="col-md-4">
                        <a href="{{url('painel/cobertura/create')}}" class="btn btn-outline-info btn-block btn-lg"><b>Cadastrar</b></a>

                    </div>


                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>



<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover data-table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        {{-- <th>Cod</th> --}}
                                        <th>Animal</th>
                                        <th>Tipo</th>
                                        <th>Cobertura</th>
                                        <th>Prox. Cio</th>
                                        <th>Prox. toque</th>
                                        <th>Secagem</th>
                                        <th>Pré parto</th>
                                        <th>Previsão de parto</th>

                                        <th>Diagnostico</th>

                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach($results as $result)

                                    <tr>

                                        <td>{{$result->animal->name }}</td>
                                        <td>{{$result->type }}</td>
                                        <td>{{ \Carbon\Carbon::parse($result->date)->format('d/m/Y')}}</td>
                                          @if($result->diagnosis == 'Não Diagnosticado')
                                            <td>{{ \Carbon\Carbon::parse($result->date_next_heat)->format('d/m/Y')}}</td>
                                            <td>{{ \Carbon\Carbon::parse($result->date_touch)->format('d/m/Y')}}</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                          @endif
                                          @if($result->diagnosis == 'Prenha')

                                            <td>-</td>
                                            <td>-</td>
                                            <td>{{ \Carbon\Carbon::parse($result->dry_date)->format('d/m/Y')}}</td>
                                            <td>{{ \Carbon\Carbon::parse($result->transition_date)->format('d/m/Y')}}</td>
                                            <td>{{ \Carbon\Carbon::parse($result->delivery_date)->format('d/m/Y')}}</td>
                                          @endif
                                          @if($result->diagnosis == 'Falha')
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                          @endif



                                        <td>
                                            @if($result->diagnosis == 'Não Diagnosticado')

                                                <div class="btn-group w-100">
                                                    <button type="submit" class="btn btn-success col" data-id='{{$result->id}}' value="Prenha" name="Prenha" id="Prenha" title="Prenha">
                                                        <i class="far fa-thumbs-up"></i>
                                                    </button>
                                                    <button type="submit" class="btn btn-danger col " data-id='{{$result->id}}' value="Falha" name="Falha" id="Falha" title="Falha">
                                                        <i class="far fa-thumbs-down"></i>
                                                    </button>
                                                    @endif

                                                    @if($result->diagnosis == 'Prenha')
                                                        <button type="submit" class="btn btn-success col">
                                                            <i class="far fa-thumbs-up"></i> {{$result->diagnosis }}
                                                        </button>

                                                        @endif
                                                        @if($result->diagnosis == 'Falha')
                                                            <button type="submit" class="btn btn-danger col">
                                                                <i class="far fa-thumbs-down"></i> {{$result->diagnosis }}
                                                            </button>

                                                            @endif
                                                </div>
                                        </td>

                                    </tr>



                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- /.container-fluid -->
</section>


@section('js')

<script type="text/javascript">
    $(document).ready(function() {
        $('button').click(function() {
            let id =  $(this).data("id")
            let status = $(this).val();
            let userId = {{auth()->user()->id}};
//console.log(id);

            validUrl = '{{url("/painel/changeDiagnostic")}}';
            $.ajax({
                type: "GET",
                dataType: "json",
                url: validUrl,
                data: {
                    'id': id,
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
