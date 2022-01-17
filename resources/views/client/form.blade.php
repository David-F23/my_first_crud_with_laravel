@extends('theme.base')

@section('content')

    <div class="container py-3 text-center">
        <div>
            @if (isset($client))
                <h1>Editar clientes</h1>
            @else
                <h1>Crear clientes</h1>
            @endif

            @if (isset($client))
                <form action="{{ route('client.update', $client) }}" method="post">
                @method('PUT')
            @else
                <form action="{{ route('client.store') }}" method="post">
            @endif
            
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{old('name') ?? @$client->name}}">
                    <p class="form-text">Ingrese el nombre del cliente</p>
                    @error('name')
                        <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                </div>
                <hr>

                <div class="mb-3">
                    <label for="due" class="form-label">Saldo</label>
                    <input type="number" name="due" step="0.01" class="form-control" value="{{old('due') ?? @$client->due}}">
                    <p class="form-text">Ingrese el saldo del cliente</p>
                    @error('due')
                        <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                </div>
                <hr>

                <div class="mb-3">
                    <label for="comments" class="form-label">Comentarios</label>
                    <textarea class="form-control" name="comments" cols="30" rows="4">{{old('comments') ?? @$client->comments}}</textarea>
                    <p class="form-text">Ingrese un cometario</p>
                </div>
                <hr>

                @if (isset($client))
                    <button class="btn btn-info" type="submit">Guardar cambios</button>
                @else
                    <button class="btn btn-info" type="submit">Guardar cliente</button>
                @endif

            </form>
        </div>
    </div>
    
@endsection