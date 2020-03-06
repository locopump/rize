<?php

namespace App\Models\Entities\Publico;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = 'likes';

    /**
     * @var array
     */
    protected $fillable = [
        'clean_name',
        'email'
    ];
}
