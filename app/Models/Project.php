<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'image', 'tags', 'color', 'demo_url', 'sort_order'])]
class Project extends Model
{
    protected function casts(): array
    {
        return [
            'tags' => 'array',
        ];
    }
}
