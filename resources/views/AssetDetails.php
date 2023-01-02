<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class AssetDetails extends Model
{
    protected $table = 'model_details';
    protected $primaryKey = 'id';
    protected $fillable = ['assets_type_id','asset_name','model','specification','serial_number','other'];
}