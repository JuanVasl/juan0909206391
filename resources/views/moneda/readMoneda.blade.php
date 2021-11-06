@extends('layouts.index')

@section('title', 'Criptomoneda Read')

@section('content')
    <div class="container ml-5">
        <div class="row justify-content-center">
            <div class="col-md-10 ml-5">
                <h2 class="text-center mt-5">CRIPTOMONEDAS</h2>

                <!-- Boton de registro -->
                <a class="btn btn-outline-success mb-3" href="{{url('/criptomoneda/create')}}"><i class="fas fa-plus-square"></i> Registrar Moneda</a>

                <table class="table table-light table-bordered table-hover text-center">
                    <thead class="bg-info">
                    <tr>
                        <th>Logotipo</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripcion</th>
                        <th>Lenguaje</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>

                    <tbody class="">
                    @foreach($coins as $coin)
                        <tr>
                            <td>
                                <img src="{{ asset('storage').'/'.$coin->logotipo}}" alt="" height="80">
                            </td>
                            <td>{{$coin->nombre}}</td>
                            <td>$ {{$coin->precio}}</td>
                            <td>{{$coin->descripcion}}</td>
                            <td>{{$coin->descripcion_lenguaje}}</td>
                            <td>
                                <div>
                                    <a href="{{url('/criptomoneda/update', $coin->id)}}">
                                        <i class="fas fa-pencil-alt btn btn-outline-primary mb-2 mr-2">  Update</i>
                                    </a>

                                    <form action="{{ route('delete', $coin->id) }}" method="POST" class="formulario-eliminar">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Seguro de eliminar el usuario?')" class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash-alt"> Delete</i>
                                        </button>
                                    </form>


                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
                <!-- Paginacion -->
                {{ $coins->links() }}

            </div>
        </div>
    </div>
@endsection
