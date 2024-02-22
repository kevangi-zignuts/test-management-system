<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['question_name', 'option1', 'option2', 'option3', 'answer', 'test_id'];
    public function test(){
        return $this->belongsTo(Test::class);
    }
}
