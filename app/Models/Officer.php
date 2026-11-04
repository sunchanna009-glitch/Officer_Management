<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Officer extends Model
{
    protected function casts(): array
    {
        return ['dob' => 'date'];
    }

    protected $fillable = [
        'name', 'gender', 'dob', 'badge_number', 'rank',
        'phone', 'email', 'address', 'description', 'department_id'
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
