<?php

namespace App\Traits\Relationships;

use app\Models\Filament\Page;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait PageTrait
{
    public function pages(): MorphMany
    {
        return $this->morphMany(Page::class, 'pageable');
    }
}
