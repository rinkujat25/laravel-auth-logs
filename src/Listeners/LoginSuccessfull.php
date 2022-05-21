<?php

namespace Rinku\Authlogs\Listeners;

use Illuminate\Support\Facades\Request;
use Illuminate\Auth\Events\Login;
use Rinku\Authlogs\Models\AuthenticationLog;

class LoginSuccessfull
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        exit("this");
    }
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        
        exit("this");

        AuthenticationLog::create([
            'type' => AuthenticationLog::TYPE_LOGIN,
            'user_id' => $event->user ? $event->user->id : null,
            'ip_address' => Request::ip(),
            'user_agent' => Request::header('User-Agent'),
            'login_at' => now(),
            'logout_at' => null,
            'failed_login_reason' => null,
        ]);
    }
}
