@extends('adminlte::page')

@section('title', 'Panel de Administracion')

@section('content_header')
    <h1>Pagina para crear un nuevo Post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.posts.store', 'autocomplete' => 'off', 'files'=> true]) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=> 'form-control', 'placeholder'=> 'Ingrese el Nombre del Post']) !!}

                    @error('name')
                        <span class="text-red">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class'=> 'form-control', 'placeholder'=> 'Ingrese el Slug del Post', 'readonly']) !!}

                    @error('slug')
                        <span class="text-red">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Categorias') !!}
                    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}

                    @error('category_id')
                        <span class="text-red">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Etiquetas</p>
                    @foreach ($tags as $tag)
                        <label class="mr-4">
                            {!! Form::checkbox('tags[]', $tag->id, null) !!}
                            {{$tag->name}}
                        </label>
                    @endforeach

                    @error('tags')
                        <span class="text-red">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>
                    <label class="mr-2">
                        {!! Form::radio('status', 1, true) !!}
                        Borrador
                    </label>
                    
                    <label>
                        {!! Form::radio('status', 2) !!}
                        Publicado
                    </label>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <div class="image-wrapper">
                            <img id="picture" src="https://media.istockphoto.com/id/1418475387/photo/robotic-hand-pressing-a-keyboard-on-a-laptop-3d-rendering.jpg?s=2048x2048&w=is&k=20&c=dX60FXq1lYs1GW4PwAxSEpgewaCJjZ2n23xbR2iKqVM=" alt="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('file', "Imagen que se Mostrara en el  Post") !!}
                            {!! Form::file('file', ['class'=> 'form-control-file', 'accept'=> 'image/*']) !!}

                        @error('file')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi possimus eligendi dolor optio vero esse suscipit ratione doloribus voluptatibus? Suscipit voluptas amet cumque minima ducimus culpa perspiciatis delectus incidunt sit!</p>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('extract', 'Extracto') !!}
                    {!! Form::textarea('extract', null, ['class'=> 'form-control']) !!}

                    @error('extract')
                        <span class="text-red">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Cuerpo del Post') !!}
                    {!! Form::textarea('body', null, ['class'=> 'form-control']) !!}

                    @error('body')
                        <span class="text-red">{{$message}}</span>
                    @enderror

                </div>
                {!! Form::submit('Crear Post', ['class'=>'btn btn-secondary btn-sm']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper{
        position: relative;
        padding-bottom: 56.25%;
    }

    .image-wrapper img {
        position: absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;

    }
    </style>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}">
    </script>

<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>">

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
            });

    </script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

<script>
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );


        //cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            let file = event.target.files[0];

            let reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
</script>


    
@endsection