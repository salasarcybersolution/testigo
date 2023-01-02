<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class AssetDetails extends Model
{
    protected $table = 'assets_details';
    protected $primaryKey = 'id';
    protected $fillable = ['assets_type_id','asset_name','model','specification','serial_number','sim','other','sim_number','imsi_number','contact_number'];
}