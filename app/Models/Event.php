<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'description',
        'price',
        'image',
        'start_date'
    ];

    public function likes():BelongsToMany
    {
        return $this->belongsToMany(Like::class);
    }

    public function imgUrl():string
    {
        return Storage::disk('public')->url($this->image);
    }
}
