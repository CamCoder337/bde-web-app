<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'price',
        'image',
        'active'
    ];
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->withPivot('total_quantity', 'total_price');
    }

    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }

    public function getFormatedPrice():string
    {
        return str_replace('.', ',', $this->price) . ' XAF';
    }
}
