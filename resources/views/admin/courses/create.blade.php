@extends('layouts.admin')

@section('content')
    <div class="container bg-white p-5 rounded shadow-sm text-dark">
        <h2 class="mb-4">Create Course</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('courses.store') }}" method="POST" id="courseForm" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Description:</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label>Category:</label>
                <select name="category_id" class="form-select" required>
                    <option value="">-- Select --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>


            <!-- Modules -->
            <h5 class="mt-4">Modules</h5>
            <div id="modulesContainer"></div>
            <button type="button" class="btn btn-outline-success mt-2" onclick="addModule()">+ Add Module</button>

            <div class="mt-4">
                <button class="btn btn-primary">Create Course</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        let moduleCount = 0;
        let moduleContentCounts = {}; // Track how many contents are in each module

        // Add Module
        function addModule() {
            const moduleIndex = moduleCount++;
            moduleContentCounts[moduleIndex] = 0; // Initialize content count for this module

            const moduleID = `module-${moduleIndex}`;
            const moduleHTML = `
        <div class="card mb-3 p-3 module-block" id="${moduleID}">
            <div class="d-flex justify-content-between align-items-center">
                <h6>Module ${moduleIndex + 1}</h6>
                <button type="button" class="btn btn-sm btn-danger remove-module">Remove</button>
            </div>

            <div class="mb-2">
                <input type="text" name="modules[${moduleIndex}][title]" class="form-control" placeholder="Module title" required>
            </div>

            <div class="module-contents"></div>
            <button type="button" class="btn btn-outline-secondary btn-sm mt-2 add-module-content" data-index="${moduleIndex}">+ Add Content</button>
        </div>
    `;
            $('#modulesContainer').append(moduleHTML);
        }

        // Remove Module
        $(document).on('click', '.remove-module', function () {
            $(this).closest('.module-block').remove();
        });

        // Add Module Content
        $(document).on('click', '.add-module-content', function () {
            const moduleIndex = $(this).data('index');
            const contentIndex = moduleContentCounts[moduleIndex]++;
            const container = $(this).siblings('.module-contents');

            const contentHTML = `
        <div class="border p-3 mb-2 module-content-block bg-light text-dark rounded">
            <div class="row mb-2">
                <div class="col-md-6">
                    <label>Title</label>
                    <input type="text" name="modules[${moduleIndex}][contents][${contentIndex}][title]" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Video Length</label>
                    <input type="text" name="modules[${moduleIndex}][contents][${contentIndex}][video_length]" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label>Video File</label>
                    <input type="file" name="modules[${moduleIndex}][contents][${contentIndex}][video_file]" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Video URL</label>
                    <input type="text" name="modules[${moduleIndex}][contents][${contentIndex}][video_url]" class="form-control">
                </div>
            </div>
            <button type="button" class="btn btn-danger btn-sm mt-2 remove-module-content">Remove Content</button>
        </div>
    `;

            container.append(contentHTML);
        });

        // Remove Content Block
        $(document).on('click', '.remove-module-content', function () {
            $(this).closest('.module-content-block').remove();
        });

    </script>
@endpush


