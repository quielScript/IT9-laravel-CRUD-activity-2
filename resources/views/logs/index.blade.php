@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h2 class="fw-bold">Logs</h2>
            <a href="{{ route('logs.create') }}" class="btn btn-primary">&plus; Add Log</a>
        </div>

        @if ($logs->isEmpty())
            <p class="text-center">No logs yet. Add one to get started</p>
        @else
            <div>
                <ul class="list-group list-group-flush">
                    @foreach ($logs as $log)
                        <li class="list-group-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="fs-5 fw-bold">{{ $log->book_title }}</p>
                                    <p><span class="fw-semibold">Borrowed by:</span> {{ $log->borrower_name }}</p>
                                    <p><span class="fw-semibold">Borrow time:</span> {{ $log->created_at->format('M j, Y g:i A') }}</p>
                                </div>
                                <div class="d-flex items-center gap-3">
                                    @php
                                        $statusStyle = match ($log->return_status) {
                                            'borrowed' => 'text-bg-warning',
                                            'returned' => 'text-bg-success',
                                        };
                                    @endphp
                                    <span
                                        class="badge rounded-pill {{ $statusStyle }}">{{ str_replace('_', ' ', ucfirst($log->return_status)) }}</span>
                                    <a href="{{ route('logs.edit', $log) }}" class="link-primary">Edit</a>
                                    <form action="{{ route('logs.destroy', $log) }}" method="POST"
                                        onsubmit="return confirm('Delete this Log?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-link link-danger p-0 border-0 bg-transparent">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
    </div>
    @endif
@endsection
