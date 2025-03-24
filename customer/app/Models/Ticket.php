<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'assigned_to',
    ];

    const STATUS_OPEN = 'open';
    const STATUS_IN_PROGRESS = 'in progress';
    const STATUS_CLOSED = 'closed';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    // Relation avec l'agent (l'utilisateur assigné au ticket)
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}