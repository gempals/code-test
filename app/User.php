<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    //protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','remember_token','active','email_token','verified','company_id','m_organizational_structures_id','subfields_id','last_login','last_logout'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

 

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomPassword($token));
    }   

}

class CustomPassword extends ResetPassword{
    public function toMail($notifiable)
    {
        return (new MailMessage)
        
            ->line('We are sending this email because we recieved a forgot password request.')
            ->action('Reset Password', url('password/reset/'.$this->token))
            ->line('If you did not request a password reset, no further action is required. Please contact us if you did not submit this request.');
    }
}
