<div>
   <div class="card">      
        <div class="card-header">
            <input wire:model.live="search" class="form-control" placeholder="Introduzca el nombre del Post a Buscar">
        </div>
        @if ($posts->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td width = 10px>
                                @can('admin.posts.edit')
                                <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit', $post)}}">Editar</a>
                                @endcan
                            </td>
                            <td width = 10px>
                                @can('admin.posts.update')
                                    <form action="{{route('admin.posts.destroy', $post)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$posts->links()}}
        </div>
        @else 
        <div class="card-body">
            <div class="alert alert-secondary text-center">
                <strong>No se Encuentran Registros</strong>
            </div>
        </div>
        @endif
   </div>
</div>
