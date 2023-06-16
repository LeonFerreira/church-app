<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Church extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'headquarters' => 'boolean',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
