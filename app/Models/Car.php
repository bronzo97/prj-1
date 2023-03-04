<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Car extends Model
{
    use HasFactory;
    
    protected $table = 'cars';
    protected $primaryKey = 'targa';
    public $timestamps = true;

    public function brand(): hasMany
    {
        return $this->hasMany(Brand::class);
    }

    public function modelc(): hasMany
    {
        return $this->hasMany(Modelc::class);
    }
    
    public function color(): hasMany
    {
        return $this->hasMany(Color::class);
    }

    public function owner(): BelongsToMany
    {
        return $this->belongsToMany(Owner::class);
    }
}
