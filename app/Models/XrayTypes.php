<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XrayTypes extends Model
{
    use HasFactory;
    protected $table = 'xray_types';

    protected $guarded = ['id'];

}