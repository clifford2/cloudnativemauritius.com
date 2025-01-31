@extends('layouts.main')

@section('content')
<section class="mt-6 md:mt-8 md:max-w-4xl mx-auto px-4 md:px-8 lg:px-0">

  <h2 class="before:content-[''] before:border-[10px] md:before:border-[16px] before:border-transparent before:border-l-gray-800 before:rounded before:mb-[2px] md:before:mb-[4px] before:mr-1
          flex items-center text-xl md:text-3xl text-gray-800 font-bold uppercase mb-6 mt-8 md:mt-10">
    Blog</h2>

  <div class="grid md:grid-cols-2 gap-6 md:gap-8">
    @foreach ($posts as $post)
    <div
      class="overflow-hidden p-4 md:p-6 bg-white flex items-center justify-between focus-visible:ring-2 rounded-md border-2 border-r-4 border-b-4 border-gray-800 md:hover:scale-[1.02] transition ease-in-out duration-200 relative">
      <a href="{{ route('post.show', $post) }}" class="absolute inset-0"></a>
      <div class="grid gap-4 h-full grid-rows-[auto_auto_1fr_auto]">
        <div class="flex gap-2">
          @foreach ($post->categories as $category)
          <span class="px-3 py-1 rounded-md bg-gray-200 text-xs font-medium uppercase text-gray-800">{{ $category->name }}</span>
          @endforeach
        </div>
        <div class="-mt-2 text-black text-lg md:text-xl font-bold">{{ $post->title }}</div>
        <div class="text-black flex-grow">
          {{ $post->meta_description }}
        </div>
        <div class="grid gap-4">
          @foreach ($post->authors as $author)
          <div class="flex flex-row gap-2 items-center">
            <div>
              <img class="h-10 rounded-full shadow-md" src="{{ asset('storage/'.$author->photo) }}" />
            </div>
            <div>
              <p class="text-xs uppercase font-semibold">By {{ $author->name }}</p>
              <p class="mt-0.5 text-xs font-light">{{ $post->published_at->format('d M Y') }}</p>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </div>
    @endforeach
  </div>
</section>
<div class="mt-8 max-w-4xl mx-auto">
  {{ $posts->links() }}
</div>
@endsection

@section('head')
<title>Blog | Cloud Native Chapter of Mauritius</title>
@endsection