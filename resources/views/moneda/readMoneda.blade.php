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

                                    <form action="{{ url('/criptomoneda/delete', $coin->id) }}" method="POST" class="formulario-eliminar">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
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

<!-- SweetAlert2 -->
@section('js')
    <!--Importamos la libreria -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Alert Guardar -->
    @if(session('guardar') == 'ok')
        <script>
            Swal.fire(
                '¡Guardado!',
                'La criptomoneda se guardo con exito',
                'success'
            )
        </script>
    @endif

    <!-- Alert Modificar -->
    @if(session('editar') == 'ok')
        <script>
            Swal.fire(
                '¡Modificado!',
                'La criptomoneda se modifico con exito',
                'success'
            )
        </script>
    @endif

    <!-- Alert Eliminar -->
    @if(session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'La criptomoneda se elimino con exito.',
                'success'
            )
        </script>
    @endif

    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "La criptomoneda se eliminara definitivamente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection
