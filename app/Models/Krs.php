<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    //
    protected $table="krs";
        
    protected $primaryKey = 'id';
    public $incrementing = true; 
    protected $keyType = 'string';

    protected $fillable=['npm','kode_matakuliah'];
}
