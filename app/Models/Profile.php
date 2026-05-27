<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'avatar', 'tagline', 'github_url', 'linkedin_url', 'email'])]
class Profile extends Model
{
}
