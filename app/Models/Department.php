<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $fillable = ['department_name', 'location', 'description'];

    public function officers(): HasMany
    {
        return $this->hasMany(Officer::class);
    }
}
