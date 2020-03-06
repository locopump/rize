<?php

namespace App\Models\Entities\Publico;

use Illuminate\Database\Eloquent\Model;

class Venues extends Model
{
    protected $table = 'venues';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'cluster'
    ];
}
