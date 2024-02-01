<div>    
    <div class="card">
        <div class="card-header">
            <input wire:model.live="search" type="text" class="form-control" placeholder="Introduzca el nombre del Usuario a Buscar">
        </div>
        @if ($users->count())
        <div class="card-body">    
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td width = "10px"> <a class="btn btn-primary btn-sm" href="{{route('admin.users.edit', $user)}}">Editar</a> </td>
                                {{-- <td width = "10px">
                                    <form action="{{route('admin.users.destroy', $user)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>    
                </table>        
        </div>
        <div class="card-footer">
            {{$users->links()}}
        </div>
    </div>
    @else
        <div class="card-body">
            <div class="alert alert-secondary text-center">
                <strong>No se Encuentran Registros</strong>
            </div>
        </div>
    @endif
</div>
