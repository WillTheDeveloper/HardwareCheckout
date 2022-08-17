<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'image_url',
        'category_id',
        'collect_location'
    ];

    protected $casts = [
        'quantity' => 'integer',
        'category_id' => 'integer'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Request()
    {
        return $this->hasMany(Request::class);
    }
}
