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
     * All quizzes
     */
    public function index() {
        $quizzes = Quiz::orderBy('created_at', 'desc')->paginate($this->quizzes_per_page);

        return view( 'quizzes', compact(['quizzes']) );
    }

    /**
     * All quizzes of the user
     */
    public function userQuizzes(User $user) {
        $quizzes = $user->quizzes()->orderBy('created_at', 'desc')->paginate($this->quizzes_per_page);

        return view( 'quizzes', ['quizzes' => $quizzes] );
    }

    /**
     * All quizzes of the current user
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

    /**
     *
     */
    public function newQuiz() {
     return view( 'edit-quiz', ['quiz' => null] );
    }


    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|min:5',
            'questions.*.body' => 'required|min:5'
        ]);

        $user = Auth::user();

        $quiz = new Quiz;

        $quiz->name = $data['name'];
        $quiz->user()->associate( $user );
        $quiz->save();

        $quiz->questions()->createMany( $data['questions'] );


        $quiz->save();

        return redirect()->route('quiz', ['quiz' => $quiz->id]);
    }
}
