@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="h2">{{$quiz->name}}</h1>
                        <hr>
                        <button type="button" class="btn btn-primary">Start Quiz</button>
                    </div>

                    <div class="col-md-4">
                        <h4 class="h3">Quiz statistic</h4>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Blah</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Blah</td>
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