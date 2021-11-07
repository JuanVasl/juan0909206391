@extends('layouts.index')

@section('title', 'Lenguaje Create')

@section('content')
    <div class="container ml-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5 ml-5">
                <br><br><br><br>
                <!-- Validacion Errores-->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <br>
                <div class="card">
                    <form action="{{ url ('/lenguaje/save') }}" method="POST">
                        @csrf
                        <div class="card-header text-center text-white bg-info">
                            <h4>CREAR LENGUAJE</h4>
                        </div>

                        <div class="card-body">

                            <div class="row form-group">
                                <label for="" class="col-3">Descripcion</label>
                                <input type="text" name="descripcion_leng" class="form-control col-md-8">
                            </div>

                            <div class="row form-group">
                                <button type="submit" class="btn btn-outline-success col-md-4 offset-2 mr-3"><i class="fas fa-save"></i> Guardar</button>
                                <a class="btn btn-outline-danger btn-xs col-md-4" href=" {{ url('/lenguaje/read') }}"><i class="fas fa-ban"></i> Cancelar</a>
                            </div>

                        </div>

                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection
