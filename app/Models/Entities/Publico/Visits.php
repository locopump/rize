<?php

namespace App\Models\Entities\Publico;

use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    protected $table = 'visits';

    /**
     * @var array
     */
    protected $fillable = [
        'date',
        'email',
        'venue_id'
    ];
}
