<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Task extends Model
{
    use HasFactory;

    public $table = 'tasks';
    protected $fillable = [
        'title',
        'scheduled_date',
        'description',
        
    ];

   

}
