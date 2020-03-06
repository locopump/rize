<?php

namespace App\Models\Entities\Publico;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    protected $table = 'visitors';

    /**
     * @var array
     */
    protected $fillable = [
        'email',
        'gender',
        'date_of_birth'
    ];
}
