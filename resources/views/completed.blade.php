@extends('layouts.main')

@section('content')
    <section>
        <div class="flex items-center justify-center mt-6">
            <div>
                <div class="flex flex-col items-center space-y-4">
                    <h1 class="text-4xl font-bold">Thank You !</h1>
                    <p>Thank you for your proposed talk, we will be in touch!</p>
                    <a href="{{ route('home') }}">
                        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Home</button>
                    </a>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('head')
<title>Thank You!</title>
@endsection
