@extends('adminlte::page')

@section('title', 'Panel de Administracion')

@section('content_header')
    <h1>Crear Nueva Categoria</h1>
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=> 'admin.categories.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=> 'Introduzca el nombre de la Categoria']) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=> 'Introduzca el slug de la Categoria', 'readonly']) !!}

                    @error('slug')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                {!! Form::submit('Crear Categoria', ['class'=> 'btn btn-success']) !!}

            {!! Form::close() !!}

        </div>
   </div>


@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}">
    </script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
            });
    </script>
@endsection

