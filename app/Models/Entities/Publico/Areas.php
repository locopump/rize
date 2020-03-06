<?php

namespace App\Models\Entities\Publico;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    protected $table = 'areas';

    /**
     * @var array
     */
    protected $fillable = [
        'm2',
        'floor_num',
        'tenant_id',
        'venue_id',
        'id',
        'group_id'
    ];
}
