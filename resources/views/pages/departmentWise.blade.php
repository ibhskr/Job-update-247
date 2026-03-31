@extends('layouts.masterlayout')

@section('title')
{{ $extraData['title'] }} - JobUpdate247
@endsection

@section('content')

<div class="max-w-7xl mx-auto px-4 py-8">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            {{ $extraData['title'] }}
        </h1>
        <p class="text-gray-600 mt-2">
            {{ $extraData['description'] }}
        </p>
    </div>

    {{-- Table Card --}}
    <div class="bg-white shadow-md rounded-xl overflow-hidden">

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">

                {{-- Table Head --}}
                <thead class="bg-gray-800 text-gray-100 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Department</th>
                        <th class="px-6 py-3">Vacancies</th>
                        <th class="px-6 py-3">Deadline</th>
                        <th class="px-6 py-3 text-right">Actions</th>
                    </tr>
                </thead>

                {{-- Table Body --}}
                <tbody class="divide-y divide-gray-200">

                    @forelse($posts as $post)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4">
                            {{ $post->id }}
                        </td>

                        <td class="px-6 py-4 font-semibold text-gray-800">
                            {{ $post->title }}
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 uppercase">
                                {{ $post->department ?? 'N/A' }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            {{ $post->vacancy ?? '—' }}
                        </td>

                        <td class="px-6 py-4">
                            @if($post->apply_end_date)
                                {{ \Carbon\Carbon::parse($post->apply_end_date)->format('d M Y') }}
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('posts.show', $post->id) }}"
                               class="inline-block px-3 py-1.5 text-xs font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                                View
                            </a>
                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-10">
                            <div class="text-gray-500">
                                <p class="text-lg font-semibold">No jobs found</p>
                                <p class="text-sm">Try another department or check back later.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $posts->links() }}
    </div>

</div>

@endsection