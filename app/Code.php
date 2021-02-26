<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $fillable = ['user_id', 'code', 'expired_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeGenerateCode($query, User $user)
    {

        //check code is live
        if ($code = $this->checkCodeIsLive($user)) {
            $code = $code->code;
        } else {
            do {
                //create code
                $code = mt_rand(10000, 99999);
                //check code exist
            } while ($this->checkCodeExist($code, $user));
            //store code
            $user->codes()->create([
                'code' => $code,
                'expired_at' => now()->addMinute(2)
            ]);
        }
        return $code;
    }


    private function checkCodeIsLive(User $user)
    {
        return $user->codes()->where('expired_at', '>', now())->first();
    }

    private function checkCodeExist(int $code, User $user)
    {
        return !!$user->codes()->where('code', $code)->first();
    }
}
