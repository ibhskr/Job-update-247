<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Job Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Add New Job Notification</h4>
                    </div>
                    <div class="card-body">
                        {{-- Display Validation Errors --}}
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('posts.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Job Title</label>
                                <input type="text" name="title" class="form-control" placeholder="e.g. SSC MTS Recruitment 2026" value="{{ old('title') }}">
                            </div>
                            <div class="mb-3">
                                <label>is Vacancy?</label>
                                <input type="radio" name="isVacancy" value="1" @checked(old('isVacancy')==1)>
                                <span>Yes</span>

                                <input type="radio" name="isVacancy" value="0" @checked(old('isVacancy')==0)>
                                <span>No</span>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Notification ID</label>
                                    <input type="text" name="Notifications_id" class="form-control" placeholder="SSC-001" value="{{ old('Notifications_id') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Department</label>
                                    <input type="text" name="department" class="form-control" placeholder="e.g. Railway" value="{{ old('department') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Total Vacancy</label>
                                    <input type="number" name="vacancy" class="form-control" value="{{ old('vacancy') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Qualification</label>
                                    <input type="text" name="qualification" class="form-control" placeholder="e.g. 10th Pass / Graduate" value="{{ old('qualification') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Apply Start Date</label>
                                    <input type="date" name="apply_start_date" class="form-control" value="{{ old('apply_start_date') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Apply End Date</label>
                                    <input type="date" name="apply_end_date" class="form-control" value="{{ old('apply_end_date') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Official Website</label>
                                    <input type="text" name="official_website" class="form-control" placeholder="e.g. https://www.example.com/.." value="{{ old('official_website') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Notification Link</label>
                                    <input type="text" name="notification_link" class="form-control" placeholder="e.g. https://www.example.com/.." value="{{ old('notification_link') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Apply Link</label>
                                    <input type="text" name="Apply_link" class="form-control" placeholder="e.g. https://www.example.com/.." value="{{ old('Apply_link') }}">
                                </div>
                            </div>



                            <div class="d-flex justify-content-between">
                                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary px-5">Publish Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>