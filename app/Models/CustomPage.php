<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPage extends Model
{
    use HasFactory;

    protected $table = 'custom_pages';
    public $timestamps = false;

    public function customTables()
    {
        return $this->hasMany(CustomTable::class);
    }


    public function column_names()
    {
        return $this->hasOne(ColumnName::class);
    }
}
