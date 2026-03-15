<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;

class CarPart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'brand',
        'category',
        'model',
        'price',
        'image',
        'images',
        'video',
        'condition',
        'part_number',
        'is_available',
        'is_deal',
        'deal_starts_at',
        'deal_ends_at',
        'stock_quantity',
    ];

    protected $casts = [
        'images' => 'array',
        'is_available' => 'boolean',
        'is_deal' => 'boolean',
        'price' => 'decimal:2',
        'deal_starts_at' => 'datetime',
        'deal_ends_at' => 'datetime',
    ];

    // Get encrypted ID
    public function getHashidAttribute()
    {
        $hashids = new Hashids(config('app.key'), 10);
        return $hashids->encode($this->id);
    }

    // Decode hashid to ID
    public static function decodeHashid($hashid)
    {
        $hashids = new Hashids(config('app.key'), 10);
        $decoded = $hashids->decode($hashid);
        return $decoded[0] ?? null;
    }

    // Route key name
    public function getRouteKeyName()
    {
        return 'hashid';
    }

    // Resolve route binding
    public function resolveRouteBinding($value, $field = null)
    {
        $id = self::decodeHashid($value);
        return $id ? $this->where('id', $id)->firstOrFail() : null;
    }

    // Get full image URL
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return asset('images/placeholder.jpg');
    }

    // Get full video URL
    public function getVideoUrlAttribute()
    {
        if ($this->video) {
            return asset('storage/' . $this->video);
        }
        return null;
    }

    // Get multiple images URLs
    public function getImagesUrlsAttribute()
    {
        if ($this->images) {
            return collect($this->images)->map(function ($image) {
                return asset('storage/' . $image);
            })->toArray();
        }
        return [];
    }
}

