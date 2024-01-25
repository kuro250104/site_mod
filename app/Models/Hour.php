<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hour extends Model
{
    use HasFactory;
    protected $table = "hours";

    protected $fillable = [
        "name", "value"
    ];

    public function team(): HasMany
    {
        return $this->hasMany(Hour::class, 'timer');
    }

}
