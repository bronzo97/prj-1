<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Owner extends Model
{
    use HasFactory;
    
    protected $table = 'owners';
    protected $primaryKey = 'codice_fiscale';
    public $timestamps = true;

    public function car(): BelongsToMany
    {
        return $this->belongsToMany(Car::class);
    }
}