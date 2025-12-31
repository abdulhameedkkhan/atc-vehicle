<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;

class ProductEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'message',
        'status',
        'admin_response',
    ];

    protected $casts = [
        'status' => 'string',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
