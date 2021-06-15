@extends('adminlte::page')
@section('title', 'Aplicação de Medicamentos | GPR Nutrition')
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
                    <li class="breadcrumb-item active">Aplicações</li>
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
                        <a href="{{url('painel/aplicacoes/create')}}" class="btn btn-outline-info btn-block btn-lg"><b>Cadastrar</b></a>

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
                                      <th>#</th>
                                      <th>Animal</th>
                                      <th>Medicamento</th>
                                      <th>Data aplicação</th>
                                      <th>Próxima aplicação</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach($results as $result)

                                    <tr>

                                        <td>{{$result->id }}</td>
                                        <td>{{$result->animals->earring.' / '. $result->animals->name }}</td>
                                        <td>{{$result->medicines->description }}</td>
                                        @if($result->application_date <= Carbon::now())
                                          <td>{{Carbon::parse($result->application_date)->format('d/m/Y')}}</td>
                                        @endif


                                        <td>
                                          @if($result->next_application <= Carbon::now())
                                            <span class="badge bg-success">
                                              {{Carbon::parse($result->next_application)->format('d/m/Y')}}
                                            </span>
                                        @else
                                          <span class="badge bg-warning">
                                            {{Carbon::parse($result->next_application)->format('d/m/Y')}}
                                          </span>
                                            @endif
                                        </td>


                                        {{-- <td>
                                            <a href='{{route('works.show',$result->id)}}' align="right" class="btn btn-primary btn-sm"><i class="fas fa-folder"></i> View</a>
                                        </td>
                                        <td>
                                            <a href='{{route('works.edit',$result->id)}}' align="right" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{route('works.destroy', $result->id)}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" align="right" class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza?');"><i class="fas fa-trash"></i> Deletar</button>
                                            </form>



                                        </td> --}}
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


<script>
    $(document).ready(function() {
        $('.data-table').dataTable();
    });
</script>
{{-- <script src="{{asset('vendor/jquery/jquery.js')}}"></script> --}}
@stop
@section('js')
@jquery
@toastr_js
@toastr_render
@stop
@section('css')
@toastr_css
@stop
@endsection
