<?php

namespace App;

use App\User;
use App\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /**
     * Quiz author
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Retrieve quiz questions
     */
    public function questions() {
        return $this->hasMany(Question::class);
    }

    /**
     *
     */
    public function is_mine() {
        $user = Auth::user();

        if (!isset($user)) {
           return false;
        }

        return $this->user_id === $user->id;
    }
}
