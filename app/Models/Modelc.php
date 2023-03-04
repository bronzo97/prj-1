<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Modelc extends Model
{
    use HasFactory;
    
    protected $table = 'models';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
    
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class,'models_brand_id_foreign','brand_is');
    }
}
