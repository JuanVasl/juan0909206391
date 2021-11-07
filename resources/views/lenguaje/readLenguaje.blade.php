@extends('layouts.index')

@section('title', 'Lenguaje Read')

@section('content')
    <div class="container ml-5">
        <div class="row justify-content-center">
            <div class="col-md-10 ml-5">
                <h2 class="text-center mt-5">LENGUAJES</h2>

                <!-- Boton de registro -->
                <a class="btn btn-outline-success mb-3" href="{{url('/lenguaje/create')}}"><i class="fas fa-plus-square"></i> Registrar Lenguaje</a>

                <table class="table table-light table-bordered table-hover text-center">
                    <thead class="bg-info">
                    <tr>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th style="width: 300px">Acciones</th>
                    </tr>
                    </thead>

                    <tbody class="">
                    @foreach($lenguajes as $lenguaje)
                        <tr>
                            <td>{{$lenguaje->id}}</td>
                            <td>{{$lenguaje->descripcion_lenguaje}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{url('/lenguaje/update', $lenguaje->id)}}">
                                        <i class="fas fa-pencil-alt btn btn-outline-primary mr-2">  Update</i>
                                    </a>

                                    <form action="{{ url('/lenguaje/delete', $lenguaje->id) }}" method="POST" class="formulario-eliminar">
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
                {{ $lenguajes->links() }}

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
                'El lenguaje de programación se guardo con exito',
                'success'
            )
        </script>
    @endif

    <!-- Alert Modificar -->
    @if(session('editar') == 'ok')
        <script>
            Swal.fire(
                '¡Modificado!',
                'El lenguaje de programación se modifico con exito',
                'success'
            )
        </script>
    @endif

    <!-- Alert Eliminar -->
    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "El lenguaje de programacion se eliminara definitivamente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'No se puede eliminar el lenguaje, debido a que se esta utilizando',
                    })
                }
            })
        });
    </script>
@endsection
