<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['role', 'company', 'period', 'description', 'tags', 'sort_order'])]
class Experience extends Model
{
    protected function casts(): array
    {
        return [
            'tags' => 'array',
        ];
    }
}
