<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Billable, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'kana',
        'email',
        'password',
        'postal_code',
        'address',
        'phone_number',
        'birthday',
        'occupation',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'date',
        'password' => 'hashed',
    ];

    /**
     * この会員が投稿したレビュー
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * この会員の予約
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * この会員がお気に入り登録した店舗
     */
    public function favoriteShops(): BelongsToMany
    {
        return $this->belongsToMany(Shop::class, 'favorites')->withTimestamps();
    }

    /**
     * 有料会員かどうか（サブスク契約中かどうか）
     */
    public function isPaidMember(): bool
    {
        return $this->subscribed('premium_plan');
    }
}
