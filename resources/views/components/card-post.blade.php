@props(['post'])
<article class="mb-6 bg-white shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a 
            href="{{route('Post.show', $post)}}">{{$post->name}}
            </a>
        </h1>
    </div>
    <div class="px-6 text-base text-gray-700 mb-2">
        {{$post->extract}}
    </div>
    <div class="px-6 pt-4 pb-2">
        @foreach ($post->tags as $tag)
            <a href="{{route('Post.tag', $tag)}}" class="inline-block bg-gray-200 rounded-lg px-2 mb-2 text-gray-700">{{$tag->name}}</a>
        @endforeach
    </div>
</article>