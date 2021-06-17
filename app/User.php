<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id ID
 * @property string $name 初期値はGithubの表示名
 * @property string $email Githubのメールアドレス
 * @property string $avatar Githubのアイコンurl
 * @property string $twitter_id ツイッターアカウントID
 *
 * @property-read string $twitter_url
 * @property-read boolean $is_posted ポートフォリオが登録されたか *
 * @property-read Post $post 特定のポートフォリオ
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

    public function getTwitterUrlAttribute(): string
    {
        if ($this->twitter_id) {
            return "https://twitter.com/" . $this->twitter_id;
        }
        return '';
    }

    public function getIsPostedAttribute(): bool
    {
        return $this->posts()->exists();
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * ポートフォリオ(一人一つ前提とのなので)
     *
     * @return Post
     */
    public function getPostAttribute(): Post
    {
        return $this->posts()->first();
    }
}
