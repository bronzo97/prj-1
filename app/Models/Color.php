<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';
    protected $primaryKey = 'id';
    public $timestamps = true;

    

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
