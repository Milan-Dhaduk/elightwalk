@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Create New Record</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('records.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Record</button>
        </form>
    </div>
</div>
@endsection
