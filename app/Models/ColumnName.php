<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColumnName extends Model
{
    use HasFactory;

    protected $table = 'column_names';
    public $timestamps = false;
}
