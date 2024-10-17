<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Many-to-many relationship with User.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_teams');
    }

    /**
     * One-to-many relationship with Ticket.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
