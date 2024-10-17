<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelType extends Model
{
    use HasFactory;

    protected $table = 'channels_types';

    protected $fillable = [
        'name',
    ];

    /**
     * One-to-many relationship with Channel.
     */
    public function channels()
    {
        return $this->hasMany(Channel::class, 'type_id');
    }
}
