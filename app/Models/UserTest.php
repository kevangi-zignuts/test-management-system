<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTest extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'test_id', 'question_id', 'result_id', 'option'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function test(){
        return $this->belongsTo(Test::class);
    }
    public function question(){
        return $this->belongsTo(Question::class);
    }
}
