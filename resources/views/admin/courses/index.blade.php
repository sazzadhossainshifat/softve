@extends('layouts.admin')

@section('content')
    <div class="container bg-white p-5  rounded shadow-sm text-dark">
        <h2 class="mb-4">All Courses</h2>

        <table class="table table-bordered table-hover">
            <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Modules</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->category->name ?? 'N/A' }}</td>
                    <td>{{ $course->modules->count() }}</td>
                    <td>
                        <form method="POST" action="{{ route('courses.destroy', $course->id) }}" onsubmit="return confirm('Delete this course?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
