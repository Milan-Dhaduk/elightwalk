@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>{{ $record->title }}</h2>
    </div>
    <div class="card-body">
        <p class="card-text">{{ $record->description }}</p>
    </div>
</div>
@endsection
