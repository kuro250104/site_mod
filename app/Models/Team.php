<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;
    protected $table = "teams";

    protected $fillable = [
        "name",
    ];

    public function team(): HasMany
    {
        return $this->hasMany(Worker::class, 'team_id');
    }

}
