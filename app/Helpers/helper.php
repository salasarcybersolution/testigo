<?php
/**
* below funcation will use to show active/in-active status 
*
* @param $status
*/
//Get User Type
function getCity($id){
	$result = DB::table('cities')->where('id', $id )->first();
    return $result; 
}
function getState($id){
	$result = DB::table('states')->where('id', $id )->first();
    return $result; 
}


function getUserInfo($id){
	$result = DB::table('users')->where('id', $id )->first();
    return $result; 
}
?>