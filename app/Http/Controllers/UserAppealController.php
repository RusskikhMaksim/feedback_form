<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAppeal;
use Illuminate\Http\Request;
use App\Jobs\NotifyManagerJob;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserAppealController extends Controller
{
    public function showAppealForm(): Response
    {
        $userId = Auth::id();
        $userEmail = User::getUserEmail($userId);
        $canSend = UserAppeal::canUserSendAppeal($userEmail);

        if ($canSend) {
            return response()->view('appeal');
        }

        return response()->view('appeal_rejected');
    }

    public function appeal(Request $request): Response
    {
        $appeal = UserAppeal::create($request->except('_token'));

        $details = ['email' => 'recipient@example.com'];
        NotifyManagerJob::dispatch($appeal, $details);

        return response()->view('appeal_success');
    }
}
