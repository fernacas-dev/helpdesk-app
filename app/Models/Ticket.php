<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tickets';

    protected $fillable = [
        'title',
        'description',
        'status_id',
        'priority_id',
        'assigned_to',
        'team_id',
        'due_date',
        'resolved_at',
        'category_id',
        'channel_id',
        'created_by',
    ];

    /**
     * Relación con el modelo Status.
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Relación con el modelo Priority.
     */
    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    /**
     * Relación con el modelo User para el creador del ticket.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Relación con el modelo User para el usuario asignado al ticket.
     */
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * Relación con el modelo Team.
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Relación con el modelo Category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relación con el modelo Channel.
     */
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
