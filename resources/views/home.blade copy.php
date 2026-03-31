<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Updates 247 - Home</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Job Update 247</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-success">Create New Post</a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-0">

                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Department</th>
                            <th>Vacancies</th>
                            <th>Deadline</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>

                            <td>
                                <strong>{{ $post->title }}</strong>
                            </td>

                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $post->department ?? 'N/A' }}
                                </span>
                            </td>

                            <td>
                                {{ $post->vacancy ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $post->apply_end_date ? \Carbon\Carbon::parse($post->apply_end_date)->format('d M Y') : 'N/A' }}
                            </td>

                            <td>
                                <div class="btn-group btn-group-sm">

                                    <a href="{{ route('posts.show', $post->id) }}"
                                        class="btn btn-outline-primary">
                                        View
                                    </a>

                                    {{-- Uncomment if needed --}}
                                    {{--
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                    class="btn btn-outline-warning">
                                    Edit
                                    </a>

                                    <form action="{{ route('posts.destroy', $post->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this post?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-outline-danger">
                                            Del
                                        </button>
                                    </form>
                                    --}}

                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                No job posts found. Run your seeder!
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
        <div>
            <div class="container my-4">
                <h1>Menu</h1>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Latest Updates -->
                    <div class="col">
                        <a href="{{ route('pages.updates') }}" class="card bg-primary-subtle h-100 shadow-sm text-decoration-none border-0 hover-shadow transition">
                            <div class="card-body">
                                <h5 class="card-title text-dark fw-bold">Latest Updates</h5>
                                <p class="card-text text-muted">
                                    Stay informed with the latest announcements, notifications, results, and important updates all in one place.
                                </p>
                            </div>

                        </a>
                    </div>

                    <!-- Notifications -->
                    <div class="col">
                        <a href="{{ route('pages.vacancyNotification') }}" class="card bg-primary-subtle h-100 shadow-sm text-decoration-none border-0 hover-shadow transition">
                            <div class="card-body">
                                <h5 class="card-title text-dark fw-bold">Vacancy Notifications</h5>
                                <p class="card-text text-muted">
                                    Access all official notices, exam alerts, and important announcements released by authorities. </p>
                            </div>

                        </a>
                    </div>

                    <!-- Results -->
                    <div class="col">
                        <a href="{{ route('pages.results') }}" class="card bg-primary-subtle h-100 shadow-sm text-decoration-none border-0 hover-shadow transition">
                            <div class="card-body">
                                <h5 class="card-title text-dark fw-bold">Results</h5>
                                <p class="card-text text-muted">
                                    Check your exam results quickly and stay updated with the latest result declarations.
                                </p>
                            </div>

                        </a>
                    </div>

                    <!-- Exam City Intimation -->
                    <div class="col">
                        <a href="{{ route('pages.admitCard') }}" class="card bg-primary-subtle h-100 shadow-sm text-decoration-none border-0 hover-shadow transition">
                            <div class="card-body">
                                <h5 class="card-title text-dark fw-bold">Exam City Intimation & Admit Card</h5>
                                <p class="card-text text-muted">
                                    View your allotted exam city details and plan your travel in advance with ease. </p>
                            </div>

                        </a>
                    </div>

                    <!-- Study Materials -->
                    <div class="col">
                        <a href="{{ route('pages.resource') }}" class="card bg-primary-subtle h-100 shadow-sm text-decoration-none border-0 hover-shadow transition">
                            <div class="card-body">
                                <h5 class="card-title text-dark fw-bold">Free Study Resources</h5>
                                <p class="card-text text-muted">
                                    Access high-quality study materials, notes, and preparation guides at no cost.
                            </div>

                        </a>
                    </div>




                </div>
            </div>
        </div>
        <!-- section 3 -->
        <div class="container my-4">
            <h1>Deparment Wise</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <a href="{{ route('pages.dept',['dept'=>"ssc"]) }}" class="card h-100">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">SSC</h5>
                            <p class="card-text">CGL, CHSL, MTS, SSC GD, CPO...</p>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('pages.dept',['dept'=>'railway']) }}" class="card h-100">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">RAILWAY</h5>
                            <p class="card-text">NTPC, ALP, TECHNICIAN...</p>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('pages.dept',['dept'=>'bank']) }}" class="card h-100">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">BANK</h5>
                            <p class="card-text">SBI, IBPS, CLARK...</p>
                        </div>
</a>
                </div>
                <div class="col">
                    <a href="{{ route('pages.dept',['dept'=>'defence']) }}" class="card h-100">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">DEFENCE</h5>
                            <p class="card-text">AGNIVEER, ARMY, SSC GD...</p>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('pages.dept',['dept'=>'civilService']) }}" class="card h-100">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">CIVIL SERVICE</h5>
                            <p class="card-text">UPSC, STATE PSC..</p>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('pages.dept',['dept'=>'others']) }}" class="card h-100">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">OTHERS</h5>
                            <p class="card-text">ENINEERING, PARAMEDICAL, MORE</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

</body>

</html>