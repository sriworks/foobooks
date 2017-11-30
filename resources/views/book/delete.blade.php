@extends('layouts.master')

@section('title')
    Delete book Confirmation for {{ $book->title }}
@endsection

@section('content')
    <form method="POST">
        {{ csrf_field() }}
        <h2 class="text-center">Are you sure to delete "{{ $book['title'] }}" ?</h2>
        <div class="text-center">
            <input type="submit" class="btn btn-primary" value="Confirm Delete" />
        </div>
    </form>
@endsection