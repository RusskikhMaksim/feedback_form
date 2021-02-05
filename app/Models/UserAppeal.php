<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAppeal extends Model
{
    use HasFactory;

    protected $table = 'user_appeals';

    protected $primaryKey = 'appeal_id';

    protected $fillable = [
        'subject',
        'message',
        'file',
    ];
}
