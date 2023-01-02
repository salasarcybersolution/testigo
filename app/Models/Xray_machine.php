<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xray_machine extends Model
{
    use HasFactory;
    protected $table = 'xray_machine';
    protected $primaryKey = 'id';
    protected $fillable = ['machine_name','status','description','model'];

}