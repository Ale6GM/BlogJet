@extends('adminlte::page')

@section('title', 'Panel de Administracion')

@section('content_header')
    <h1>Pagina para Editar un Post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($post,['route'=>['admin.posts.update', $post], 'autocomplete' => 'off', 'files'=> true, 'method'=> 'put']) !!}
                {{-- {!! Form::hidden('user_id', auth()->user()->id) !!} --}}                
                @include('admin.posts.partials.form')
                </div>
                {!! Form::submit('Editar Post', ['class'=>'btn btn-secondary btn-sm']) !!}
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