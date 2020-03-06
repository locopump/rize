<?php

namespace App\Models\Entities\Publico;

use Illuminate\Database\Eloquent\Model;

class Tenants extends Model
{
    protected $table = 'tenants';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'brand',
        'category'
    ];
}
