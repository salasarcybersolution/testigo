<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Gallary extends Model
{
    protected $table = 'gallary';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'image', 'link','status'];
}