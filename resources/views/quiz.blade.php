@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="h2">{{$quiz->name}}</h1>
                        <hr>
                        <a href="#" class="btn btn-primary">Start Quiz</a>

                        @if($quiz->is_mine())
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                        @endif
                    </div>

                    <div class="col-md-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Quiz statistic</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Best Result</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Avarage Result</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Your result</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
