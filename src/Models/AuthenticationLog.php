<?php

namespace Rinku\Authlogs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthenticationLog extends Model
{
    use HasFactory;

    protected $table = 'authentication_logs';
    
    const TYPE_LOGIN = 0;
    const TYPE_LOGOUT = 1;
    const TYPE_FAILED_LOGIN = 2;
    CONST FAILED_LOGIN_REASON_WRONG_ID = 0;
    CONST FAILED_LOGIN_REASON_WRONG_ID_OR_PASSWORD = 1;


    protected $fillable = [
        'id', 'type', 'user_id', 'ip_address', 'user_agent', 'login_at', 'logout_at', 'failed_login_reason', 
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }
}
