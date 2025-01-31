@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.main')

@section('content')
<section class="mt-8 md:mt-10 md:max-w-4xl mx-auto px-4 md:px-8 lg:px-0">
  <div class="mb-6">
    <a href="{{ route('blog') }}" class="inline-flex items-center font-semibold text-lg text-gray-800 hover:text-primary">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
      </svg>
      Back to Blog Posts
    </a>
  </div>
  <div class="bg-white rounded-md p-4 md:p-6 border-2 border-r-4 border-b-4 border-gray-800">
    <div class="mb-2 md:mb-3">
      @foreach ($post->categories as $category)
      <span class="px-3 py-1 rounded-md bg-gray-200 text-xs font-medium uppercase text-gray-800">{{ $category->name }}</span>
      @endforeach
    </div>
    <h2 class="mb-2 text-2xl md:text-3xl font-bold">{{ $post->title }}</h2>
    <p class="mb-4 text-xs font-normal">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</p>

    <div class="grid {{ $post->authors->count() > 1 ? 'md:grid-cols-2' : ''}} gap-6 md:gap-8">
      @foreach ($post->authors as $author)
      <div class="flex gap-4 items-center">
        <img class="size-12 rounded-full shadow-md" src="{{ asset('storage/'.$author->photo) }}" />
        <div class="grid gap-2 grid-rows-[auto_1fr_auto] h-full">
          <p class="text-sm uppercase font-medium">By {{ $author->name }}</p>
          @if($author->bio)
          <p class="text-xs text-wrap">{{ $author->bio }}</p>
          @endif

          @if($author->socialMedias->count())
          <x-socials :socials="$author->socialMedias" />
          @endif
        </div>
      </div>
      @endforeach
    </div>
    <div class="prose max-w-full mt-8">
      <div>{{ \Illuminate\Mail\Markdown::parse($post->content) }}</div>
    </div>
  </div>
</section>
@endsection

@section('head')
<title>{{ $post->meta_title ?? $post->title }}</title>
<meta name="description" content="{{ $post->description ?? Str::limit($post->content, 150) }}" />
<meta property="og:type" content="article" />
<meta property="og:site_name" content="{{ env('APP_NAME') ?? 'Cloud Native Chapter of Mauritius' }}" />
<meta property="og:title" content="{{ $post->meta_title ?? $post->title }}" />
<meta property="og:description" content="{{ $post->meta_description ?? $post->description }}" />
<meta property="og:url" content="{{ route('post.show', $post) }}" />
<meta property="og:image" content="{{ $post->image ?? env('APP_URL') . '/images/cloud_native_mauritius_cover.png' }}" />
<meta property="article:published_time" content="{{ $post->created_at }}" />
<meta property="article:modified_time" content="{{ $post->updated_at }}" />
@endsection