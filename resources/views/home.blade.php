@extends('layouts.masterlayout')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-8 hidden md:block">

    {{-- ================= TABLE & PC ================= --}}
    <div class="bg-white shadow-md rounded-xl overflow-hidden ">

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">

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

                <tbody class="divide-y divide-gray-200">
                    @forelse($posts as $post)
                    <tr class="hover:bg-gray-50 transition ">

                        <td class="px-6 py-4">{{ $post->id }}</td>

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
                            <p class="text-gray-500 font-semibold">No jobs found</p>
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


{{-- ================= MENU ================= --}}
<div class="mt-12">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Menu</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        @php
        $menus = [
        ['title'=>'Latest Updates','route'=>'pages.updates','desc'=>'Stay informed with latest announcements and updates'],
        ['title'=>'Vacancy Notifications','route'=>'pages.vacancyNotification','desc'=>'Official notices and exam alerts'],
        ['title'=>'Results','route'=>'pages.results','desc'=>'Check latest exam results quickly'],
        ['title'=>'Admit Card','route'=>'pages.admitCard','desc'=>'Exam city & admit card details'],
        ['title'=>'Free Study Resources','route'=>'pages.resource','desc'=>'Access free notes & materials'],
        ];
        @endphp

        @foreach($menus as $menu)
        <a href="{{ route($menu['route']) }}"
            class="block bg-blue-50 hover:bg-blue-100 transition rounded-xl p-6 shadow-sm">

            <h5 class="font-bold text-gray-800 mb-2">
                {{ $menu['title'] }}
            </h5>

            <p class="text-sm text-gray-600">
                {{ $menu['desc'] }}
            </p>
        </a>
        @endforeach

    </div>
</div>


{{-- ================= DEPARTMENT ================= --}}
<div class="mt-12">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Department Wise</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $departments = [
        ['name' => 'SSC', 'dept' => 'ssc', 'img' => 'images/ssc.png', 'desc' => 'CGL, CHSL, MTS, GD'],
        ['name' => 'Railway', 'dept' => 'railway', 'img' => 'images/rrb.png', 'desc' => 'NTPC, ALP, Technician'],
        ['name' => 'Bank', 'dept' => 'bank', 'img' => 'images/bank.png', 'desc' => 'SBI, IBPS, Clerk'],
        ['name' => 'Defence', 'dept' => 'defence', 'img' => 'images/defence.png', 'desc' => 'Army, Navy, Airforce'],
        ['name' => 'Civil Service', 'dept' => 'civilservice', 'img' => 'images/civil.png', 'desc' => 'UPSC, PSC'],
        ['name' => 'Others', 'dept' => 'others', 'img' => 'images/all.png', 'desc' => 'Engineering, Paramedical'],
        ];
        @endphp

        @foreach($departments as $d)
        <a href="{{ route('pages.dept', ['dept' => $d['dept']]) }}"
            class=" bg-white hover:shadow-lg transition rounded-xl border h-20 md:h-32  flex">

            <img src="{{ asset($d['img']) }}" alt="{{ $d['name'] }}" class=" h-full max-w-1/2 p-4 mb-4 object-cover rounded-xl">

            <div class="h-full w-full flex flex-col justify-center">
                <h5 class="text-lg font-bold text-gray-800 mb-2">
                    {{ $d['name'] }}
                </h5>

                <p class="text-sm text-gray-600">
                    {{ $d['desc'] }}
                </p>
            </div>
        </a>
        @endforeach
    </div>
</div>



@endsection