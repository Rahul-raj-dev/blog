<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function credit()
    {
       $user->balance= $user->balance + request()->amount;
       $user->transactions->create(['credit'=>$amount]);
       $user->save();
    }
    public function debit()
    {
        $user->balance=$user->balance-request()->amount;
        $user->save();
        $user->transactions->create(['debit=>$amount']);
    }
    public function transfer()
    {
        $user->debit(request()->amount);
        $user->save();

        $receiver=User::find(request()->receiver_id);
        $receiver->credit(request()->amount);
        $receiver->save();

    }
}
