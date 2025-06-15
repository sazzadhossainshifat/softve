@extends('layouts.admin')

@section('content')
    <h2 class="mb-4">Add New Category</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name:</label>
            <input type="text" class="form-control bg-dark text-white" name="name" id="name" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
