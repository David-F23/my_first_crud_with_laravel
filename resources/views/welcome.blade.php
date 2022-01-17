@extends('theme.base')

@section('content')

    <div class="container py-5 text-center">
        <div>
            <h1>hola Mundo</h1>
            <a href="{{ route('client.index') }}" class="btn btn-primary">Clientes</a>
        </div>
    </div>
    
@endsection