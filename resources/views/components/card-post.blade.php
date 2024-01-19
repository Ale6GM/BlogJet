@props(['post'])
<article class="mb-6 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($post->image)
        <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
    @else
        <img class="w-full h-80 object-cover object-center" src="https://media.istockphoto.com/id/1418475387/photo/robotic-hand-pressing-a-keyboard-on-a-laptop-3d-rendering.webp?s=2048x2048&w=is&k=20&c=dX60FXq1lYs1GW4PwAxSEpgewaCJjZ2n23xbR2iKqVM=" alt="">
    @endif
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a 
            href="{{route('Post.show', $post)}}">{{$post->name}}
            </a>
        </h1>
    </div>
    <div class="px-6 text-base text-gray-700 mb-2">
        {!!$post->extract!!}
    </div>
    <div class="px-6 pt-4 pb-2">
        @foreach ($post->tags as $tag)
            <a href="{{route('Post.tag', $tag)}}" class="inline-block bg-gray-200 rounded-lg px-2 mb-2 text-gray-700">{{$tag->name}}</a>
        @endforeach
    </div>
</article>