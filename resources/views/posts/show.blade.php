<x-app-layout>
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-8">
       <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>
       <div class="text-lg text-gray-500 mb-2">
            {!!$post->extract!!}
       </div>
       <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Contenido principal del post --}}
            <div class="lg:col-span-2">
                <figure>
                    @if ($post->image)
                        <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
                    @else
                        <img class="w-full h-80 object-cover object-center" src="https://media.istockphoto.com/id/1418475387/photo/robotic-hand-pressing-a-keyboard-on-a-laptop-3d-rendering.webp?s=2048x2048&w=is&k=20&c=dX60FXq1lYs1GW4PwAxSEpgewaCJjZ2n23xbR2iKqVM=" alt="">
                    @endif
                </figure>
                <div class="text-justify text-lg text-gray-500 mt-4">
                    {!!$post->body!!}
                </div>               
            </div>
            {{-- Post Relacionados --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Mas en {{$post->category->name}}</h1>
                
                <ul>
                    @foreach ($relacionados as $rel)
                        <li class="mb-4">
                            <a class = "flex" href="{{route('Post.show', $rel)}}">
                                @if ($rel->image)
                                <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($rel->image->url)}}" alt="">
                                @else
                                <img class="w-36 h-20 object-cover object-center" src="https://media.istockphoto.com/id/1418475387/photo/robotic-hand-pressing-a-keyboard-on-a-laptop-3d-rendering.webp?s=2048x2048&w=is&k=20&c=dX60FXq1lYs1GW4PwAxSEpgewaCJjZ2n23xbR2iKqVM=" alt="">
                                @endif
                                <span class="ml-2 text-gray-600">{{$rel->name}}</span>
                            </a>
                        
                        </li>
                    @endforeach
                </ul>

            </aside>
       </div>
    
    </div>
</x-app-layout>