<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $clientId = Auth::id();

        $clientData = User::where('id', '=', "$clientId")->get(['name', 'email']);
        $this->client_name = $clientData[0]->name;
        $this->client_email = $clientData[0]->email;
    }

    public static function canUserSendAppeal(string $email): bool
    {
        $carbon = Carbon::now();

        $lastAppeal = self::where('client_email', '=', "$email")
                            ->latest()
                            ->first();

        if (isset($lastAppeal->created_at) && ($carbon->diffInHours($lastAppeal->created_at) <= 24)) {
            return false;
        }

        return true;
    }
}
