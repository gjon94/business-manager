<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function employees()
    {
        return $this->hasMany(User::class);
    }

    public function customTables()
    {
        return $this->hasMany(CustomTables::class);
    }

    public function customPages()
    {
        return $this->hasMany(CustomPage::class);
    }
}
