<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;

class Inventory extends Model
{
    use HasFactory;
    use Searchable;

    #[SearchUsingFullText(['name', 'description'])]
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'collect_location' => $this->collect_location,
        ];
    }

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
