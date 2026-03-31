@extends('layouts.masterlayout')

@section('title')
{{ $post->title }} - Details
@endsection

@section('content')

<div class="max-w-7xl mx-auto px-4 py-8">

    {{-- ================= HEADER ================= --}}
    <div class="bg-gray-50 border-b border-gray-200 rounded-xl p-6 mb-8">

        <a href="{{ route('posts.index') }}"
           class="inline-block mb-4 text-sm text-gray-600 hover:text-gray-900">
            ← Back to List
        </a>

        <h1 class="text-3xl font-bold text-gray-800">
            {{ $post->title }}
        </h1>

        <p class="text-blue-600 font-medium mt-2 uppercase text-sm">
            {{ $post->department }}
        </p>

        <p class="text-gray-500 text-sm">
            Notification ID: {{ $post->Notifications_id }}
        </p>
    </div>


    {{-- ================= CONTENT ================= --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- LEFT SIDE --}}
        <div class="lg:col-span-2">

            <div class="bg-white shadow-md rounded-xl p-6 mb-6">

                <h3 class="text-xl font-semibold text-gray-800 mb-4">
                    Job Description
                </h3>

                <p class="text-gray-700 whitespace-pre-line leading-relaxed">
                    {!! $post->description !!}
                </p>

                <hr class="my-6">

                <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Qualification
                </h3>

                <p class="text-gray-700">
                    {{ $post->qualification ?? 'Not Specified' }}
                </p>

            </div>

            {{-- ACTION BUTTONS --}}
            <div class="flex flex-wrap gap-3">

                @if($post->official_website)
                <a href="{{ $post->official_website }}" target="_blank"
                   class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                    Official Website
                </a>
                @endif

                @if($post->notification_link)
                <a href="{{ $post->notification_link }}" target="_blank"
                   class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">
                    Notification
                </a>
                @endif

                @if($post->Apply_link)
                <a href="{{ $post->Apply_link }}" target="_blank"
                   class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                    Apply Now
                </a>
                @endif

            </div>

        </div>


        {{-- RIGHT SIDE --}}
        <div>

            <div class="bg-gray-50 shadow-md rounded-xl p-6">

                <div class="mb-4">
                    <p class="text-xs uppercase text-gray-500 font-semibold">Notification ID</p>
                    <p class="text-gray-800 font-medium">
                        {{ $post->Notifications_id }}
                    </p>
                </div>

                <div class="mb-4">
                    <p class="text-xs uppercase text-gray-500 font-semibold">Total Vacancies</p>
                    <p class="text-gray-800 font-medium">
                        {{ $post->vacancy ?? 'N/A' }} Positions
                    </p>
                </div>

                <div class="mb-4">
                    <p class="text-xs uppercase text-gray-500 font-semibold">Application Starts</p>
                    <p class="text-green-600 font-medium">
                        {{ $post->apply_start_date ?? 'TBA' }}
                    </p>
                </div>

                <div class="mb-4">
                    <p class="text-xs uppercase text-gray-500 font-semibold">Application Deadline</p>
                    <p class="text-red-600 font-medium">
                        {{ $post->apply_end_date ?? 'TBA' }}
                    </p>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection