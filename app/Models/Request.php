<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'inventory_id',
        'quantity',
        'note',
        'status'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
