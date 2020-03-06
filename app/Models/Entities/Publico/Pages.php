<?php

namespace App\Models\Entities\Publico;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';

    /**
     * @var array
     */
    protected $fillable = [
        'clean_name',
        'brand'
    ];
}
