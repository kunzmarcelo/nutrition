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
                    <li class="breadcrumb-item active">Usuários</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
{{-- <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">

              <div class="col-sm-12">
                  <div class="form-group row">
                      <div class="col-md-8"></div>

                      <div class="col-md-4">
                        <a href="{{url('painel/lote/create')}}" class="btn btn-outline-info btn-block btn-lg" disabled><b>Cadastrar</b></a>

</div>


</div>
</div>
</div>
</div><!-- /.container-fluid -->
</section> --}}
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
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th class="project-actions text-right">Ações</th>
                                        {{-- <th class="project-actions text-right">Ver regras</th> --}}
                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach($results as $result)
                                    @can('admin', $result)
                                    <tr>

                                        <td>{{$result->name}}</td>
                                        <td>{{$result->email}}</td>
                                        <td>
                                            @if($result->level == 'admin')
                                                <span class="badge bg-success">{{$result->level}}</span>
                                              @else
                                                <span class="badge bg-info">{{$result->level}}</span>
                                              @endif
                                        </td>
                                        <td>
                                            @if($result->status == 'sim')
                                                <span class="badge bg-primary">{{$result->status}}</span>
                                              @else
                                                <span class="badge bg-danger">{{$result->status}}</span>
                                              @endif
                                        </td>

                                        <td class="project-actions text-right">
                                            <a class="btn btn-info" href="{{route('users.show',$result->id)}}">
                                                <i class="fas fa-eye"></i>
                                            </a>


                                            {{-- <a class="btn btn-primary btn-sm" href="{{url("/painel/user/$result->id/roles")}}">
                                                <i class="fas fa-folder">
                                                </i>
                                                Regras
                                            </a> --}}

                                        </td>

                                        @endcan
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


<script>
    $(document).ready(function() {
        $('.data-table').dataTable();
    });
</script>

@stop
@endsection
