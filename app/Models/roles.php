<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;


class roles extends Model
{
    use UsesUuid;

    protected $guarded = [];
}
 