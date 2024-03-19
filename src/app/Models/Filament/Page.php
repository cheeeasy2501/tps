<?php

namespace App\Models\Filament;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\Tags\HasTags;

class Page extends \Z3d0X\FilamentFabricator\Models\Page
{
    use HasFactory;
    use HasTags;

    protected $fillable = [
        'title',
        'slug',
        'blocks',
        'layout',
        'parent_id',
        'page_type'
    ];


    public function pageable(): MorphTo
    {
        return $this->morphTo();
    }

    public function items(): belongsToMany
    {
        return $this->belongsToMany(Item::class, 'item_pages')->withTimestamps();
    }
}
