<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city_masters'; // Default table name
    
    protected $fillable = [
        'city',
        'state_ut',
        'MSTR1',
        'MSTR2',
        'MSTR3',
        'MSTR4',
        'MSTR5',
        'MSTR6'
    ];
    
    // Don't use timestamps if the table doesn't have created_at/updated_at
    public $timestamps = false;
    
    // Accessor for state name
    public function getStateAttribute()
    {
        return $this->MSTR1 ?? $this->state_ut;
    }
    
    // Accessor for population
    public function getPopulationAttribute()
    {
        return $this->MSTR2;
    }
    
    // Scope for searching cities
    public function scopeSearch($query, $search)
    {
        return $query->where('city', 'like', "%{$search}%")
                    ->orWhere('state_ut', 'like', "%{$search}%")
                    ->orWhere('MSTR1', 'like', "%{$search}%");
    }
    
    // Scope for ordering by city name
    public function scopeOrderByCity($query)
    {
        return $query->orderBy('city');
    }
}