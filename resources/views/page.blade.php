@extends('layouts.main')

@section('content')
<section class="mt-6 md:mt-8 md:max-w-4xl mx-auto px-4 md:px-8 lg:px-0">

  <h2 class="before:content-[''] before:border-[10px] md:before:border-[16px] before:border-transparent before:border-l-gray-800 before:rounded before:mb-[2px] md:before:mb-[4px] before:mr-1
          flex items-center text-xl md:text-3xl text-gray-800 font-bold uppercase mb-6 mt-8 md:mt-10">
    {{ $page->title }}</h2>
  <div class="bg-white p-6 flex items-center justify-between focus-visible:ring-2 rounded-md border-2 border-r-4 border-b-4 border-gray-800">
    <div class="prose max-w-full">
      <div>{{ \Illuminate\Mail\Markdown::parse($page->content) }}</div>
    </div>
  </div>

</section>
@endsection

@section('head')
<title>{{ $page->title }}</title>
@endsection