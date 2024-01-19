@extends('adminlte::page')

@section('title', 'Panel de Administracion')

@section('content_header')
    <a class="btn btn-primary float-right" href="{{route('admin.posts.create')}}">Insertar Nuevo Post</a>
    <h1>Listado de Post creados</h1>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
@stop

@section('content')
    @livewire('admin.post-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop