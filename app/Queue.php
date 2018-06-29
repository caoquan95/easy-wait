<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;

class Queue extends UuidModel
{
    protected $table = 'queues';

    use SoftDeletes;

    protected $fillable = [
        'name', 'status', "user_id",
        'number_waiting_people', "estimate_waiting_time"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
