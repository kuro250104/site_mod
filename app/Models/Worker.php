<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Worker extends Model
{
    use HasFactory;
    protected $table = "workers";

    protected $fillable = [
        "name", "surname","status_id", "team_id",
    ];
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class,'status_id');
    }

}
