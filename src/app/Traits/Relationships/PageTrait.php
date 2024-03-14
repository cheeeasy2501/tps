<?php

namespace App\Traits\Relationships;

use App\Models\Page;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait PageTrait
{
    public function pages(): MorphMany
    {
        return $this->morphMany(Page::class, 'pageable');
    }
}
