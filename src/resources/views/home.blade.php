@extends('app')

@section('content')
    <p>
        Hello, here are user's 
        <em>{{ $user->name }}</em>
        current tasks:
    </p>

    <ul>
        @foreach ($user->tasks as $task)
            <li>
                {{ $task->title }}
                @if ($task->is_completed)
                    (done)
                @else
                    (not done)
                @endif
            </li>
        @endforeach
    </ul>
@endsection
