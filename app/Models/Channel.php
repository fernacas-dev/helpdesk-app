<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'channel_type_id',
    ];

    /**
     * One-to-many relationship with Ticket.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Relationship with ChannelType.
     */
    public function channels_types()
    {
        return $this->belongsTo(ChannelType::class, 'channel_type_id');
    }
}
