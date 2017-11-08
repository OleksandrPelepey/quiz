@extends('layouts.app')


@section('content')
    <div class="container">
        <h2>{{ $user->name }}'s quizzes</h2>

        <ul>
            @foreach($user->quizzes as $quiz)
                <li>
                    <h4>{{ $quiz->name }}</h4>
                    
                    <ul>
                        @foreach($quiz->questions as $question)
                            <li>
                                {{$question->body}}
                                
                                <ul>
                                    <?php $answers = json_decode($question->answers); ?>
                                    
                                    @foreach($answers as $answer)
                                        <li>
                                            {{$answer->text}}
                                            <b>{{$answer->is_correct}}</b>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
@endsection