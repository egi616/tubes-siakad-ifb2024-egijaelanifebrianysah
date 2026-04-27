<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    //
    protected $table="dosen";
        
    protected $primaryKey = 'nidn';
    public $incrementing = false; 
    protected $keyType = 'string';

    protected $fillable=['nidn','nama',];

    //satu dosen membingbing banyak mahasiswa
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'nidn', 'nidn');
    }
}
