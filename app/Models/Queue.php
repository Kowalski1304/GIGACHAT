<?php

namespace App\Models;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory, InteractsWithSockets;

    protected $fillable = [
        'id',
        'userId',
    ];
}
