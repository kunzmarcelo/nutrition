@extends('adminlte::page')
@section('title', 'Nutrition')
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
                    <li class="breadcrumb-item active">Reprodução</li>
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
                        <a href="{{url('painel/reproducao/create')}}" class="btn btn-outline-info btn-block btn-lg"><b>Cadastrar</b></a>

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
                                        <th>Data</th>
                                        <th>Animal</th>
                                        <th>Data do Parto</th>
                                        <th>Prev. Cobertura</th>
                                        <th>Prev. de Parto</th>
                                        <th>Prev. Secar</th>
                                        <th>Prev. pré parto</th>
                                        <th>DEL</th>
                                        <th>Situação</th>
                                        <th>1° Observação</th>
                                        <th>2° Observação</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach($results as $result)
                                    <tr>
                                        <td>{{Carbon::parse($result->created)->format('d/m/Y')}}</td>
                                        <td>{{$result->animals->name }}</td>
                                        <td>{{Carbon::parse($result->delivery_date)->format('d/m/Y') }}</td>
                                        <td>
                                            @empty (!$result->coverage_date)
                                            {{Carbon::parse($result->coverage_date)->format('d/m/Y') }}
                                            @endempty
                                        </td>
                                        <td>
                                            @empty (!$result->expected_delivery_date)
                                            {{Carbon::parse($result->expected_delivery_date)->format('d/m/Y') }}
                                            @endempty
                                        </td>
                                        <td>
                                            @empty (!$result->dry_date)
                                            {{Carbon::parse($result->dry_date)->format('d/m/Y') }}
                                            @endempty
                                        </td>
                                        <td>
                                            @empty (!$result->pre_delivery_date)
                                            {{Carbon::parse($result->pre_delivery_date)->format('d/m/Y')}}
                                            @endempty
                                        </td>
                                        <td>{{$result->del }}</td>
                                        <td>{{$result->situation }}</td>
                                        <td>{{$result->observation1 }}</td>
                                        <td>{{$result->observation2 }}</td>



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

@endsection
