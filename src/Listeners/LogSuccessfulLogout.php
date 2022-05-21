<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Request;
use Rinku\Authlogs\Models\AuthenticationLog;

class LogSuccessfulLogout
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
        AuthenticationLog::create([
            'type' => AuthenticationLog::TYPE_LOGOUT,
            'user_id' => $event->user->id,
            'ip_address' => Request::ip(),
            'user_agent' => Request::header('User-Agent'),
            'login_at' => null,
            'logout_at' => now(),
            'failed_login_reason' => null,
        ]);
    }
}
