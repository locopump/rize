<?php

namespace App\Models\Entities\Publico;

use Illuminate\Database\Eloquent\Model;

class SsTenants extends Model
{
    protected $table = 'ss_tenants';

    /**
     * @var array
     */
    protected $fillable = [
        'ss_tenant_id',
        'tenant_id',
        'area_id',
        'venue_id'
    ];
}
