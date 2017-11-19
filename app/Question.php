<?php

namespace App;

use App\Quiz;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['quiz_id', 'body', 'answers'];
    
    public function quiz() {
        return $this->belognsTo(Quiz::class);
    }
}
