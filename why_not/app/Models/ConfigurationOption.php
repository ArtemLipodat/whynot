<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigurationOption extends Model
{
    protected $fillable = [
        'configuration_id',
        'option_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
