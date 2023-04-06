@extends('app')

@section('content')
    <p>
      This task belongs to user:
      {{ $task->user->name }}
    </p>

    <ul>
        <li>
          <strong>{{ $task->title }}</strong>
        </li>
    </ul>
@endsection
