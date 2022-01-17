@extends('theme.base')
<?php $i = 1; ?>
@section('content')

    <div class="container py-5 text-center">
        <div>
            <h1>Listado de clientes</h1>
            <a href="{{ route('client.create') }}" class="btn btn-primary">Crear cliente</a>

            @if (Session::has('mensaje'))

                <div class="alert alert-info my-5">
                    {{Session::get('mensaje')}}
                </div>
                
            @endif
            <table class="table table-striped my-2">
                <thead class="table-light">
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Saldo</th>
                    <th style="width: 200px">Acciones</th>
                </thead>
                <tbody>
                    @forelse ($clients as $client)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$client->name}}</td>
                            <td>{{$client->due}}</td>
                            <td>
                                <a href="{{ route('client.edit', $client) }}" class="btn btn-warning">Editar</a>

                                <form action="{{ route('client.destroy', $client) }}" class="d-inline" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" onclick="return confirm('¿Esta seguro de eliminar?')" class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay registros</td>
                        </tr>
                    @endforelse
                    
                </tbody>
            </table>

            @if ($clients->count())
                {{$clients->links()}}   
            @endif
        </div>
    </div>
    
@endsection