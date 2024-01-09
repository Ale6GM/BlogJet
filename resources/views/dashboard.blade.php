<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div> --}}
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) col-span-2 @endif" style="background-image: url({{Storage::url($post->image->url)}})">
                    <div class="w-full h-full px-8 flex flex-col justify-center "> {{-- centran el titulo y lo ponen en el medio --}}
                        <div>
                            {{-- Mostramos la etiquetas que le pertenecen al post mediante el uso de la relacion tags y el uso de un foreach --}}
                            @foreach ($post->tags as $tag)
                                <a class="inline-block px-3 h-6 bg-gray-600 text-white rounded-full" href="">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="">
                                {{$post->name}}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach

        </div>
    </div>
</x-app-layout>
