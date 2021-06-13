<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name 初期値はGithubの表示名
 * @property string $email Githubのメールアドレス
 * @property string $avatar Githubのアイコンurl
 * @property string $twitter_id ツイッターアカウントID
 *
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function identityProviders(): HasMany
    {
        // IdentityProviderモデルと紐付ける 1対多の関係
        // ... とは言うものの今回はGithubのみだからhasmanyじゃなくても良さそう
        return $this->hasMany(IdentityProvider::class);
    }
}
