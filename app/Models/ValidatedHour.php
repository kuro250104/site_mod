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
        "user_id", "hour_id", "date", "team_id",
        "timer_one","coment_one", "number_one", "task_one","subtask_one", 'stage_one', "project_one",
        "timer_two","coment_two", "number_two", "task_two","subtask_two", 'stage_two', "project_two",
        "timer_three", "coment_three", "number_three", "task_three","subtask_three", 'stage_three', "project_three",
        "timer_four","coment_four", "number_four", "task_four","subtask_four", "stage_four", "project_four"
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id')->withDefault();
    }
    public function hour(): BelongsTo
    {
        return $this->belongsTo(Hour::class, 'hour_id')->withDefault();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function taskOne(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'task_one')->withDefault();
    }
    public function subtaskOne(): BelongsTo
    {
        return $this->belongsTo(Subtask::class, 'subtask_one')->withDefault();
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

    public function subtaskTwo(): BelongsTo
    {
        return $this->belongsTo(Subtask::class, 'subtask_two')->withDefault();
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
    public function subtaskThree(): BelongsTo
    {
        return $this->belongsTo(Subtask::class, 'subtask_three')->withDefault();
    }

    public function stageThree(): BelongsTo
    {
        return $this->belongsTo(Stages::class, 'stage_three')->withDefault();
    }

    public function projectThree(): BelongsTo
    {
        return $this->belongsTo(Projects::class, 'project_three')->withDefault();
    }
    public function taskFour(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'task_four')->withDefault();
    }
    public function subtaskFour(): BelongsTo
    {
        return $this->belongsTo(Subtask::class, 'subtask_four')->withDefault();
    }

    public function stageFour(): BelongsTo
    {
        return $this->belongsTo(Stages::class, 'stage_four')->withDefault();
    }

    public function projectFour(): BelongsTo
    {
        return $this->belongsTo(Projects::class, 'project_four')->withDefault();
    }

}
