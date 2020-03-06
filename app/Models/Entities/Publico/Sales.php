<?php

namespace App\Models\Entities\Publico;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';

    /**
     * @var array
     */
    protected $fillable = [
        'ss_tenant_name',
        'date',
        'num_sales',
        'num_transactions',
        'venue_id',
        'ss_tenant_id'
    ];
}
