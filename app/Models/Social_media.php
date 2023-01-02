<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Social_media extends Model
{
    protected $table = 'social_media';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'link', 'status'];
}