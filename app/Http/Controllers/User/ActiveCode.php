<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ActiveCode extends Model
{

    protected $fillable = [
        'user_id',
        'code',
        'expired_at'
    ];

    public $timestamps = false;

    public static function scopeVerifyCode($query, $user, $token)
    {
        return !! $user->activeCode()->where('expired_at','>',now())
                                    ->whereCode($token)->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeGenerateCode($query , $user)
    {

        if($code = $this->getAliveCodeForUser($user))
        {
            $code = $code->code;
        }else{
            do{
                $code = mt_rand(100000,999999);
            }while($this->checkCodeIsUnique($user,$code));

            $user->activeCode()->create([
                'code'=> $code,
                'expired_at' => now()->addMinutes(10)
            ]);
        }

        return $code;
    }

    private function getAliveCodeForUser($user)
    {
        return  $user->activeCode()->where('expired_at','>',now())->first();
    }

    private function checkCodeIsUnique($user, int $code):bool
    {
        return !! $user->activeCode()->whereCode($code)->first();
    }
}
