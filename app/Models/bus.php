<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bus extends Model
{
    /** @use HasFactory<\Database\Factories\BusFactory> */
    use HasFactory;
    public function festival()
    {
        return $this->belongsTo(festival::class);
    }
}
