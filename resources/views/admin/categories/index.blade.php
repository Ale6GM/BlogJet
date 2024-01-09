@extends('adminlte::page')

@section('title', 'Panel de Administracion')

@section('content_header')
    <h1>Lista de Categorias</h1>
@stop

@section('content')
    <p>Bienvenidos al panel de Administracion del Blog Agomin</p>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-secondary" href="{{route('admin.categories.create')}}">Nueva Categoria</a>
        </div>
        <div class="card-body">                        
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th colspan="2"></th>
                        </tr>
    
                    </thead>
                    
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.categories.edit', $category)}}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form action="{{route('admin.categories.destroy', $category)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input class="btn btn-danger btn-sm" type="submit" value="Eliminar">
                                    </form>
                                </td>
                            </tr>
                        @endforeach    
                    </tbody>
                </table>            
        </div>
    </div>

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop