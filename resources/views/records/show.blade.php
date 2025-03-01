@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Access Record</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('records.verify', $record->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="password" class="form-label">Enter Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Access Record</button>
        </form>
    </div>
</div>
@endsection
