@extends('layouts.codigoqr')

@section('titulo', "Codigo QR de $codigo->tipo") 

@section('content')
    <div class="flex justify-center">
        <div class="flex flex-col items-center justify-center">
            <h1
                class="my-20 text-4xl font-extrabold leading-none tracking-tight text-gray-900">
                Escanea el codigo QR con tu aplicacion para marcar tu {{$codigo->tipo}}</h1>
            <div>{!! QRCode::size(200)->generate($codigo->codigo) !!}</div>
        </div>
    </div>
@endsection
