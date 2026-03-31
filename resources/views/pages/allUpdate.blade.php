@extends('layouts.masterlayout')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-8  hidden md:block">

    {{-- ================= TABLE ================= --}}
    <div class="bg-white shadow-md rounded-xl overflow-hidden hidden md:block">

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">

                {{-- HEADER --}}
                <thead class="bg-gray-800 text-gray-100 uppercase text-xs ">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Department</th>
                        <th class="px-6 py-3">Vacancies</th>
                        <th class="px-6 py-3">Deadline</th>
                        <th class="px-6 py-3 text-right">Actions</th>
                    </tr>
                </thead>

                {{-- BODY --}}
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
                                <p class="text-sm">Try again later.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>
        </div>
    </div>

    {{-- ================= PAGINATION ================= --}}
    <div class="mt-6 flex justify-center">
        {{ $posts->links() }}
    </div>

</div>
<!-- ============= MOBILE VIEW ================= -->
<div class="md:hidden divide-y divide-gray-100 bg-white">
    @forelse($posts as $post)
    <div class="p-3 active:bg-gray-50 transition-colors">
        <a href="{{ route('posts.show', $post->id) }}" class="flex items-center justify-between gap-3">
            
            <div class="flex-1 min-w-0">
                <h2 class="text-sm font-semibold text-gray-900 truncate leading-tight">
                    {{ $post->title }}
                </h2>
                <div class="flex items-center mt-1 space-x-2 text-[10px] text-gray-500 uppercase tracking-wider">
                    <span class="font-medium">{{ $post->created_at->format('d M') }}</span>
                    <span>•</span>
                    <span class="text-blue-600 font-bold">New</span>
                </div>
            </div>

            <div class="flex-shrink-0">
                <div class="bg-blue-50 p-2 rounded-lg group-active:bg-blue-100">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </div>

        </a>
    </div>
    @empty
    <div class="p-8 text-center text-gray-400 text-sm italic">
        No updates found.
    </div>
    @endforelse
</div>

@endsection