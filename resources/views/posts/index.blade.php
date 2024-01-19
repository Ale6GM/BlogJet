<x-app-layout>
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-col-1 md:grid-cols-2 lg:grid-cols-3  gap-6">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @else https://media.istockphoto.com/id/1418475387/photo/robotic-hand-pressing-a-keyboard-on-a-laptop-3d-rendering.webp?s=2048x2048&w=is&k=20&c=dX60FXq1lYs1GW4PwAxSEpgewaCJjZ2n23xbR2iKqVM= @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center "> {{-- centran el titulo y lo ponen en el medio --}}
                        <div>
                            {{-- Mostramos la etiquetas que le pertenecen al post mediante el uso de la relacion tags y el uso de un foreach --}}
                            @foreach ($post->tags as $tag)
                                <a class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full" href="{{route('Post.tag', $tag)}}">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                            <a href="{{route('Post.show', $post)}}">
                                {{$post->name}}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach

        </div>
        <div class="py-6">
            {{$posts->links()}}
        </div>
    </div>
    
</x-app-layout>