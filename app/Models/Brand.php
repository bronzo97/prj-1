<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    
    protected $table = 'brands';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
        
    public function modelc(): HasMany
    {
        return $this->hasMany(Modelc::class);
    }
}
