<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $user_id
 * @property string $work_url
 * @property string $repo_url
 * @property string $comment
 * @property boolean $is_published
 *
 * @property-read boolean $is_posted ポートフォリオが登録されたか
 */
class Post extends Model
{
    protected $guarded = [];

    public function getIsPostedAttribute(): bool
    {
        /** @var User */
        $user = \Auth::user();
        return $user->posts()->exists();
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
