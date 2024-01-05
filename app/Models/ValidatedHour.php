<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ValidatedHour extends Model
{
    use HasFactory;
    protected $table = "validated_hours";

    protected $fillable = [
        "worker_id", "timer", "team_id", "timer_one", "number_one", "task_one", 'stage_one', "project_one", "timer_two", "number_two", "task_two", 'stage_two', "project_two", "timer_three", "number_three", "task_three", 'stage_three', "project_three"
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id')->withDefault();
    }

    public function worker(): BelongsTo
    {
        return $this->belongsTo(Worker::class, 'worker_id')->withDefault();
    }

    public function taskOne(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'task_one')->withDefault();
    }

    public function stageOne(): BelongsTo
    {
        return $this->belongsTo(Stages::class, 'stage_one')->withDefault();
    }

    public function projectOne(): BelongsTo
    {
        return $this->belongsTo(Projects::class, 'project_one')->withDefault();
    }

    public function taskTwo(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'task_two')->withDefault();
    }

    public function stageTwo(): BelongsTo
    {
        return $this->belongsTo(Stages::class, 'stage_two')->withDefault();
    }

    public function projectTwo(): BelongsTo
    {
        return $this->belongsTo(Projects::class, 'project_two')->withDefault();
    }
    public function taskThree(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'task_three')->withDefault();
    }

    public function stageThree(): BelongsTo
    {
        return $this->belongsTo(Stages::class, 'stage_three')->withDefault();
    }

    public function projectThree(): BelongsTo
    {
        return $this->belongsTo(Projects::class, 'project_three')->withDefault();
    }

}
