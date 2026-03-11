@php
    $editing = isset($task) && $task->exists;
@endphp

@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <a href="{{ route('books.index') }}" class="fs-6 text-secondary link link-underline-opacity-0">&larr; Back</a>
        <h2 class="mt-2 fw-bold">Edit Log</h2>
    </div>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="book_title" class="form-label">Book Title</label>
            <input type="text" name="book_title" id="book_title" class="form-control"
                value="{{ old('book_title', $book->book_title ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="borrower_name" class="form-label">Borrower Name</label>
            <input type="text" name="borrower_name" id="borrower_name" class="form-control"
                value="{{ old('borrower_name', $book->borrower_name ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="return_status" class="form-label">Return Status</label>
            <select name="return_status" id="return_status" class="form-select">
                @php
                    $status = old('return_status', $book->return_status ?? 'borrowed');
                @endphp
                <option value="borrowed" {{ $status === 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                <option value="returned" {{ $status === 'returned' ? 'selected' : '' }}>Returned</option>
            </select>
        </div>

        <div class="d-flex gap-3">
            <button type="submit" class="btn btn-primary">&plus; Add Log</button>
            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
    </form>
@endsection
