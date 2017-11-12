<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public $quizzes_per_page = 5;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['myQuizzes']);
    }

    /**
     *
     */
    public function index() {
        $quizzes = Quiz::paginate($this->quizzes_per_page);

        return view( 'quizzes', compact(['quizzes']) );
    }

    /**
     *
     */
    public function userQuizzes(User $user) {
        $quizzes = $user->quizzes()->paginate($this->quizzes_per_page);

        return view( 'quizzes', ['quizzes' => $quizzes] );
    }

    /**
     *
     */
    public function myQuizzes() {
        return $this->userQuizzes( Auth::user() );
    }

    /**
     * Single quiz page
     */
    public function quiz(Quiz $quiz) {
        return view( 'quiz', compact(['quiz']) );
    }
}
