<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stages extends Model
{
    use HasFactory;
    protected $table = "stages";
    protected $fillable = [
        "name", "surname", "project_id"
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Projects::class, 'project_id');
    }
}
