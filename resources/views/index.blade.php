@extends('layouts.main')

@section('content')
<section class="mt-6 md:mt-8 md:max-w-4xl mx-auto px-4 md:px-8 lg:px-0">

  <h2 class="
          before:content-[''] before:border-[10px] md:before:border-[16px] before:border-transparent before:border-l-gray-800 before:rounded before:mb-[2px] md:before:mb-[4px] before:mr-1
          flex items-center text-xl md:text-3xl text-gray-800 font-bold uppercase mb-6 md:mt-10">
    Upcoming Event</h2>

  @if ($events->filter->isHappeningOrInFuture()->isEmpty())
  <div class="mt-4 mb-4 p-6 bg-white rounded-md border-2 border-r-4 border-b-4 border-gray-800">
    <p class="text-gray-800 text-lg font-medium text-center">No upcoming events at the moment. Stay tuned!</p>
  </div>
  @endif

  @foreach ($events->filter->isHappeningOrInFuture()->reverse() as $event)

  <div class="mb-6 overflow-hidden p-6 bg-gradient-to-l from-primary/85 to-primary flex items-center justify-between focus-visible:ring-2 rounded-md border-2 border-r-4 border-b-4 border-gray-800 md:hover:scale-[1.02] transition ease-in-out duration-200 relative
    before:absolute before:inset-0 before:rounded-[inherit]
    before:bg-[linear-gradient(45deg,transparent_25%,theme(colors.white/.5)_50%,transparent_75%,transparent_100%)] before:bg-[length:250%_250%,100%_100%] before:bg-[position:200%_0,0_0] before:bg-no-repeat
    before:[transition:background-position_0s_ease] hover:before:bg-[position:-100%_0,0_0] hover:before:duration-[1000ms]
    [&:not(:hover)]:before:duration-[1000ms]">
    <a href="{{ $event->cncf_url }}" target="_blank" class="absolute inset-0 z-10"></a>


    <div class='flex w-full items-center md:items-stretch gap-4'>
      <div class="flex-grow flex flex-col justify-between gap-2">
        <div>
          <span class="px-3 py-1 rounded-md bg-white text-xs font-medium uppercase">{{ $event->type }}</span>
          <div class="mt-2 text-white text-lg md:text-2xl font-semibold">{{ $event->title }}</div>
        </div>
        <div class="flex md:items-center text-white flex-col md:flex-row gap-1 md:gap-4">
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>

            <span class="font-medium md:text-lg">{{ $event->location }}</span>
          </div>

          @if($event->google_map)
          <a href="{{ $event->google_map }}" target="_blank"
            class="z-20 inline-flex items-center text-sm text-white hover:text-gray-800 hover:font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 ml-[2px] md:ml-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
            </svg>
            Open in Maps
          </a>
          @endif
        </div>
      </div>
      <div
        class="bg-accent rounded-md  flex-shrink-0 flex flex-col justify-center items-center border-[3px] border-gray-800 h-[90px] md:h-[130px] w-[80px] md:w-[140px]">
        <div class="text-[18px] text-center font-semibold uppercase text-white hidden md:block leading-none pt-1">
          {{ $event->start_date->format('F') }}
        </div>
        <div class="text-xl text-center font-medium uppercase text-white block md:hidden leading-none pt-1">
          {{ $event->start_date->format('M') }}
        </div>
        <div class="grid place-items-center">
          <div class="text-4xl md:text-7xl text-white font-mono font-semibold tracking-tighter leading-none">
            {{ $event->start_date->format('d') }}
          </div>
        </div>
      </div>


    </div>
  </div>
  @endforeach

  <h2 class="before:content-[''] before:border-[10px] md:before:border-[16px] before:border-transparent before:border-l-gray-800 before:rounded before:mb-[2px] md:before:mb-[4px] before:mr-1
          flex items-center text-xl md:text-3xl text-gray-800 font-bold uppercase mb-6 mt-8 md:mt-10">
    Past Events</h2>

  @foreach ($events->filter->isPast() as $event)

  <div
    class="mb-6 p-6 bg-white flex items-center justify-between focus-visible:ring-2 rounded-md border-2 border-r-4 border-b-4 border-gray-800 md:hover:scale-[1.02] transition ease-in-out duration-200 relative">
    <a href="{{ $event->cncf_url }}" target="_blank" class="absolute inset-0 z-10"></a>

    <div class='flex w-full items-center md:items-stretch gap-4'>
      <div class="flex-grow flex flex-col self-stretch justify-between text-gray-800 gap-2">
        <div>
          <span class="px-3 py-1 rounded-md bg-gray-800 text-xs font-medium uppercase text-white">{{ $event->type }}</span>
          <div class="mt-2 text-lg md:text-2xl font-semibold">{{ $event->title }}</div>
        </div>
        <div class="flex md:items-center flex-col md:flex-row gap-1 md:gap-4">
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>

            <span class="font-medium md:text-lg">{{ $event->location }}</span>
          </div>
        </div>
      </div>
      <div
        class="bg-gradient-to-l from-primary/85 to-primary rounded-md  flex-shrink-0 flex flex-col justify-center items-center border-[3px] border-gray-800 h-[90px] md:h-[130px] w-[80px] md:w-[140px]">
        <div class="text-[18px] text-center font-semibold uppercase text-white hidden md:block leading-none pt-1">
          {{ $event->start_date->format('F') }}
        </div>
        <div class="text-xl text-center font-medium uppercase text-white block md:hidden leading-none pt-1">
          {{ $event->start_date->format('M') }}
        </div>
        <div class="grid place-items-center">
          <div class="text-4xl md:text-7xl text-white font-mono font-semibold tracking-tighter leading-none">
            {{ $event->start_date->format('d') }}
          </div>
        </div>
      </div>


    </div>
  </div>
  @endforeach
</section>
@endsection

@section('head')
<title>Cloud Native Mauritius</title>
@endsection
