<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model {

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function configurations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Configuration::class);
    }

}
