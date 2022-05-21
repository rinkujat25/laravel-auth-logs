<?php

namespace App\Listeners;

use Rinku\Authlogs\Models\AuthenticationLog;
use Illuminate\Support\Facades\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogFailedLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $failedReason = '';
        
        if(isset($event->user)){
            $failedReason = AuthenticationLog::FAILED_LOGIN_REASON_WRONG_ID_OR_PASSWORD;
        }else{
            $failedReason = AuthenticationLog::FAILED_LOGIN_REASON_WRONG_ID;
        }

        AuthenticationLog::create([
            'type' => AuthenticationLog::TYPE_FAILED_LOGIN,
            'user_id' => $event->user ? $event->user->id : null, 
            'ip_address' => Request::ip(),
            'user_agent' => Request::header('User-Agent'), 
            'login_at' => null, 
            'logout_at' => null, 
            'failed_login_reason' => $failedReason
        ]);
    }
}
