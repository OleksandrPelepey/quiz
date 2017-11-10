<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     */
    public function index() {
        $user = Auth::user()->load('quizzes.questions');

        return view( 'quiz', compact(['user']) );
    }

    /**
     *
     */
    public function userQuizes(User $user) {
        $user->load('quizzes.questions');

        return view( 'quizzes', ['quizzes' => $user->quizzes] );
    }

    /**
     *
     */
    public function myQuizzes() {
        return $this->userQuizes( Auth::user() );
    }

    /**
     * Single quiz page
     */
    public function quiz(Quiz $quiz) {
        return view( 'quiz', compact(['quiz']) );
    }
}
