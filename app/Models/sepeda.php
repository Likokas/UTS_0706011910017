<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sepeda extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'created_by',
        'harga',
        'create_date',
    ];

    public function creator(){
        return $this->belongsTo(User::class, 'created_by', 'id');

    }

}
