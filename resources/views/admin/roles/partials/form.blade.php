<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=> 'Ingrese el nombre de su Rol']) !!}

    @error('name')
        <small class="font-weight-bold text-danger">
            {{$message}}
        </small>
    @enderror
</div>

<p class="font-weight-bold">Permisos</p>
    @foreach ($permissions as $permission)
        <div>
            <label class="mr-4">
                {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
                {{$permission->description}}
            </label>
        </div>
    @endforeach