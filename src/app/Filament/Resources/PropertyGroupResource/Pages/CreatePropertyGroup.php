<?php

namespace App\Filament\Resources\PropertyGroupResource\Pages;

use App\Filament\Resources\PropertyGroupResource;
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreatePropertyGroup extends CreateRecord
{
    protected static string $resource = PropertyGroupResource::class;

}
