@extends('layouts.app')


@section('content')
    <div class="container">
        <h2>Quizzes</h2>

        <div class="list-group">
            @foreach($quizzes as $quiz)
                <a href="{{ route('quiz', ['quiz' => $quiz->id]) }}" class="list-group-item list-group-item-action">{{ $quiz->name }}</a>
            @endforeach
        </div>

        <div class="my-3">
            {{ $quizzes->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection
