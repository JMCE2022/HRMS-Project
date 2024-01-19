<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory;


    public $table = 'messages';
    protected $fillable = [
        'from',
        'email',
        'message',
        'is_read',
        
    ];

    public static function getNotify()
{
    return self::where('from', '=', Auth::user()->id)
    ->where('is_read', '=', 0);
}

}
