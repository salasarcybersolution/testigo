<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailer;
use Mail;

class Common_model extends Model{ 

  public function getData($table){
       $query = DB::table($table);
       return $query;
  } 

  public function saveData($table,$data){

     $insert_id = DB::table($table)->insertGetId($data);
     return $insert_id ;
  }

  public function updateDate($table,$WhereData,$data){
      $query = DB::table($table);
      foreach ($WhereData as $key => $value) {
        $query->where($key, '=', $value);
      }
      $query->update($data);
     return $query;
  }

  public function deleteDate($table,$colum,$id){
     $query = DB::table($table)->where($colum, '=', $id)->delete();
     return $query;
  }  
}

