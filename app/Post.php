<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property int $user_id
 * @property string $work_url
 * @property string $repo_url
 * @property string $comment
 * @property boolean $is_published
 *
 * @static Builder published クライアントからの問い合わせを取得する。
 *
 */
class Post extends Model
{
    protected $guarded = [];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
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
