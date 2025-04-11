<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Configuration extends Model {

    protected $fillable = [
        'car_id',
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function options(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Option::class, 'configuration_options');
    }

    public function getOptionNamesAttribute()
    {
        return $this->options->pluck('name');
    }

    public function price(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Price::class)
            ->where('start_date', '<=', Carbon::today())
            ->where('end_date', '>=', Carbon::today());
    }

}
