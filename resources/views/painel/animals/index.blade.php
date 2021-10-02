@extends('adminlte::page')
@section('title', 'Farms Nutrition')
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
                    <li class="breadcrumb-item active">Animal</li>
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
                        <a href="{{url('painel/animais/create')}}" class="btn btn-outline-info btn-block btn-lg"><b>Cadastrar</b></a>

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
                                        {{-- <th>#</th> --}}
                                        <th>Brinco/Nome</th>
                                        <th>Ultimo Parto</th>
                                        <th>Apto a prenhar</th>
                                        <th>Raça</th>
                                        <th>Lote</th>
                                        <th>Ativo</th>
                                        <th>#</th>

                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach($results as $result)
                                    {{-- @can('view', $result) --}}

                                    <tr>
                                        {{-- <td>{{$result->id}}</td> --}}
                                        <td>{{$result->earring.'/'.$result->name}}</td>
                                        <td>
                                            @empty (!$result->date_of_last_delivery)
                                            {{Carbon::parse($result->date_of_last_delivery)->format('d/m/Y') }}
                                            @endempty


                                        </td>
                                        <td>
                                            @empty (!$result->able_to_get_pregnant)
                                            {{Carbon::parse($result->able_to_get_pregnant)->format('d/m/Y') }}
                                            @endempty

                                        </td>
                                        {{-- <td>{{ }}</td> --}}
                                        <td>{{$result->breed }}</td>
                                        <td>{{$result->lot->name }}</td>
                                        <td>
                                            @if($result->active == 'Sim')
                                                <span class="badge bg-success">{{$result->active }}</span>
                                                @else
                                                <span class="badge bg-danger">{{$result->active }}</span>
                                                @endif
                                        </td>
                                        <td>
                                            <a href='{{route('animais.edit',$result->id)}}' align="right" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Editar</a>
                                        </td>
                                        {{-- <td>
                                          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                              Launch Default Modal
                                          </button>
                                        </td> --}}

                                        {{-- <td>
                                            <a href='{{route('works.show',$result->id)}}' align="right" class="btn btn-primary btn-sm"><i class="fas fa-folder"></i> View</a>
                                        </td>

                                        <td>
                                            <form action="{{route('works.destroy', $result->id)}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" align="right" class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza?');"><i class="fas fa-trash"></i> Deletar</button>
                                            </form>



                                        </td> --}}
                                    </tr>

                                    {{-- @endcan --}}
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
<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>One fine body…</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@section('js')


<script>
    $(document).ready(function() {
        $('.data-table').dataTable();
    });
</script>
{{-- <script src="{{asset('vendor/jquery/jquery.js')}}"></script> --}}
@stop

@endsection
