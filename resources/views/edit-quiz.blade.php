@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="" action="/quiz/create" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Quiz Name" required>
        </div>

        <h5>Questions</h5>
        
        <div class="quiz-questions-input" data-quiz-questions-input>
            <input type="hidden" name="questions" @if($quiz) value="{{json_encode($quiz)}}" @else value="" @endif>
            
            <div data-quiz-questions-input-wrap>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-primary" data-add-question>Add Question</button>
                <button type="submit" class="btn btn-primary">Save Quiz</button>
            </div>
        </div>

    </form>
</div>
@endsection
