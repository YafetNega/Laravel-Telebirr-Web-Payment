<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    public $fillable = [
        'fullname', 
        'phone', 
        'student_id', 
        'totalAmount', 
        'subject'
    ];
}
