<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportHistory extends Model
{
    use HasFactory;
    protected $fillable = ['file', 'imported_at', 'products_count'];
    public $timestamps = true;
}
