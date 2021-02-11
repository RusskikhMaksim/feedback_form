<?php

namespace App\Http\Controllers;

use App\Jobs\NotifyManagerJob;
use App\Mail\AppealShipped;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\UserAppeal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserAppealController extends Controller
{

    public function showAppealForm()
    {
        $carbon = Carbon::now();
        $user = Auth::user();
//        dd($user);
        $lastAppeal = DB::table('user_appeals')
                            ->where('client_email', '=', "$user->email")
                            ->latest()
                            ->first();

        if (isset($lastAppeal->created_at) && ($carbon->diffInHours($lastAppeal->created_at) <= 24)) {
            return view('appeal_rejected');
        }

        return view('appeal');
    }

    public function appeal(Request $request)
    {
        $appeal = new UserAppeal();
        $appeal->fill($request->except('_token'));
        $clientId = Auth::id();
        $clientData = DB::table('users')
            ->where('id', '=', "$clientId")
            ->get();
        $appeal->client_name = $clientData[0]->name;
        $appeal->client_email = $clientData[0]->email;
        $appeal->save();

        if ($appeal) {
            $details = ['email' => 'recipient@example.com'];
            NotifyManagerJob::dispatch($appeal, $details);

            return response()->view('appeal_success');
        }


    }
}
