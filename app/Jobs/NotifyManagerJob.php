<?php

namespace App\Jobs;

use App\Mail\AppealShipped;
use App\Models\UserAppeal;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NotifyManagerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private UserAppeal $appeal;
    protected $details;

    /**
     * Create a new job instance.
     *
     * @param UserAppeal $appeal
     *
     * @return void
     */
    public function __construct(UserAppeal $appeal, $details)
    {
        $this->appeal = $appeal;
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @param UserAppeal $appeal
     *
     * @return void
     */
    public function handle(UserAppeal $appeal)
    {
        //отправка email
        $email = new AppealShipped($appeal);
        Mail::to($this->details['email'])->send($email);
    }
}
