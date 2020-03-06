<?php

namespace App\Models\Entities\Publico;

use Illuminate\Database\Eloquent\Model;

class Counts extends Model
{
    protected $table = 'counts';

    /**
     * @var array
     */
    protected $fillable = [
        'date',
        'num_ingress',
        'num_transit',
        'area_id'
    ];
}
