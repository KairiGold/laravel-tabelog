<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'image',
        'description',
        'postal_code',
        'address',
        'phone_number',
        'low_price',
        'high_price',
        'opening_time',
        'closing_time',
        'seating_capacity',
    ];

    protected $casts = [
        'opening_time' => 'datetime:H:i',
        'closing_time' => 'datetime:H:i',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * この店舗をお気に入り登録している会員
     */
    public function favoritedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    /**
     * 平均評価（星の数）
     */
    public function getAverageScoreAttribute(): float
    {
        return round((float) $this->reviews()->avg('score'), 1);
    }
}
