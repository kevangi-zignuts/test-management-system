<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = ['test_name', 'description', 'level'];
    public function questions()
    {
        return $this->hasMany(Question::class, 'test_id');
    }
}
