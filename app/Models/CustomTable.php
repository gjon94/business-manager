<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomTable extends Model
{
    use HasFactory;

    protected $table = 'custom_tables';
    public $timestamps = false;


    public function belongCustomPage()
    {

        return $this->belongsTo(CustomPage::class, 'custom_page_id');
    }
}
