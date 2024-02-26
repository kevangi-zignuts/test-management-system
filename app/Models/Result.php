<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = ['test_id', 'user_id', 'total_que', 'right_que', 'percentage'];
    public function test(){
        return $this->belongsTo(Test::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
