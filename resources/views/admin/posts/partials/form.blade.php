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
            @isset ($post->image)
            <img id="picture" src="{{Storage::url($post->image->url)}}" alt="">
            @else
            <img id="picture" src="https://media.istockphoto.com/id/1418475387/photo/robotic-hand-pressing-a-keyboard-on-a-laptop-3d-rendering.jpg?s=2048x2048&w=is&k=20&c=dX60FXq1lYs1GW4PwAxSEpgewaCJjZ2n23xbR2iKqVM=" alt="">
            @endisset
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