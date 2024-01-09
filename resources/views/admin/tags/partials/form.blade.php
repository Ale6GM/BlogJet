<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=> 'Introduzca el nombre de la Etiqueta']) !!}

    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=> 'Introduzca el slug de la Etiqueta', 'readonly']) !!}

    @error('slug')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

{{--   <div class="form-group">
    {!! Form::label('color', 'Color') !!}
    {!! Form::text('color', null, ['class'=>'form-control', 'placeholder'=> 'Introduzca el Color de la Etiqueta']) !!}

    @error('color')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div> --}}
<div class="form-group">
    {{-- <label for="">Color</label>
    <select class="form-control" name="color" id="">
        <option value=""></option>
        @foreach ($tags as $tag)
            <option value="{{$tag->color}}">{{$tag->color}}</option>
        @endforeach
    </select> --}}
    {!! Form::label('color', 'Color:') !!}
    {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}
</div>
