<?php

namespace App\Models;

use App\Models\Filament\Page;
use App\Traits\Relationships\PageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;
    use PageTrait;

    protected $fillable = [
        'type',
        'name',
        'brand_id',
        'active',
        'properties'
    ];

    protected $casts = [
        'properties' => 'json'
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    public function pages(): belongsToMany
    {
        return $this->belongsToMany(Page::class)->withTimestamps();
    }
}
