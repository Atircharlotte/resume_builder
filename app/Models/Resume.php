<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $table = 'resume';
    protected $fillable = [
       'name',
       'email',
       'phone',
       'social',
       'education',
       'skills',
       'language',
       'selfIntro',
       'github_email'
    ];
}
