<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
    ];

    /**
     * Child categories relationship (self-reference).
     */
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * One-to-many relationship with Ticket.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
