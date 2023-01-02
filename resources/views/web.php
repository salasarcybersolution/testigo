<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuth; 
use App\Http\Middleware\UserAuth; 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
	

Route::any('/checkDetails',[HomeController::class,'checkDetails']);
Route::any('/logout',[HomeController::class,'logout']);
Route::any('login',[HomeController::class,'login']);
Route::any('admin',[AdminController::class,'index']); 
Route::any('userList',[AdminController::class,'userList']);
Route::any('createCenter',[AdminController::class,'createCenter']);
Route::any('saveCenter',[AdminController::class,'saveCenter']);
Route::get('editCenter/{id}',[AdminController::class,'editCenter']);
Route::put('updateCenterList/{id}',[AdminController::class,'updateCenterList']);
Route::any('deleteCenterList/{id}',[AdminController::class,'deleteCenterList']);
Route::post('get-states-by-country',[AdminController::class,'getState']);
Route::post('get-cities-by-state',[AdminController::class,'getCity']);
Route::any('OperatorList',[AdminController::class,'operatorList']);
Route::any('createOperator',[AdminController::class,'createOperator']);
Route::any('saveOperator',[AdminController::class,'saveOperator']);
Route::get('editOperator/{id}',[AdminController::class,'editOperator']);
Route::put('updateOperatorList/{id}',[AdminController::class,'updateOperatorList']);
Route::any('deleteOperatorList/{id}',[AdminController::class,'deleteOperatorlist']);
Route::any('createDoctor',[AdminController::class,'createDoctor']);
Route::any('saveDoctor',[AdminController::class,'saveDoctor']);
Route::get('editDoctor/{id}',[AdminController::class,'editDoctor']);
Route::put('updateDoctorList/{id}',[AdminController::class,'updateDoctorList']);
Route::any('doctorList',[AdminController::class,'doctorList']);
Route::any('deleteDoctor/{id}',[AdminController::class,'deleteDoctor']);
Route::any('userLists',[AdminController::class,'userLists']);
Route::any('createUser',[AdminController::class,'createUser']);
Route::any('saveUser',[AdminController::class,'saveUser']);
Route::get('edituser/{id}',[AdminController::class,'edituser']);
Route::put('updateuserList/{id}',[AdminController::class,'updateuserList']);
Route::any('deleteuser/{id}',[AdminController::class,'deleteuser']);

Route::any('xrayList',[AdminController::class,'xrayList']);
Route::any('createXraytypes',[AdminController::class,'createXraytypes']);
Route::any('saveXraytypes',[AdminController::class,'saveXraytypes']);
Route::get('editXraytypes/{id}',[AdminController::class,'editXraytypes']);
Route::put('updateXraytypes/{id}',[AdminController::class,'updateXraytypes']);
Route::any('deleteXraytypes/{id}',[AdminController::class,'deleteXraytypes']);

Route::any('pageList',[AdminController::class,'pageList']);
Route::any('createPage',[AdminController::class,'createpages']);
Route::any('savePages',[AdminController::class,'savepage']);
Route::get('editpages/{id}',[AdminController::class,'editpages']);
Route::put('updatepages/{id}',[AdminController::class,'updatepages']);
Route::any('deletepages/{id}',[AdminController::class,'deletepages']);

Route::any('socialmediaList',[AdminController::class,'socialmediaList']);
Route::any('createsocialmedialinks',[AdminController::class,'createsocialmediaLink']);
Route::any('savelink',[AdminController::class,'savelink']);
Route::any('editlinks/{id}',[AdminController::class,'editlinks']);
Route::put('updatesociallinks/{id}',[AdminController::class,'updatesociallinks']);
Route::any('deletesociallinks/{id}',[AdminController::class,'deletesociallinks']);

Route::any('contactusList',[AdminController::class,'contactusList']);
Route::any('createcontactusList',[AdminController::class,'createcontactusList']);
Route::any('savecontactuslist',[AdminController::class,'savecontactuslist']);
Route::any('editcontactus/{id}',[AdminController::class,'editcontactus']);
Route::put('updatecontactus/{id}',[AdminController::class,'updatecontactus']);
Route::any('deletecontactuslist/{id}',[AdminController::class,'deletecontactuslist']);

Route::any('sliderList',[AdminController::class,'sliderlist']);
Route::any('createsliderList',[AdminController::class,'createsliderList']);
Route::any('saveSlider',[AdminController::class,'saveslider']);
Route::any('editslider/{id}',[AdminController::class,'editslider']);
Route::put('updateslider/{id}',[AdminController::class,'updateslider']);
Route::any('deletesliderlist/{id}',[AdminController::class,'deletesliderlist']);

// Route::post('/updateslider', [AdminController::class, 'updateslider'])->name('updateslider');
Route::any('gallaryList',[AdminController::class,'gallaryList']);
Route::any('creategallaryList',[AdminController::class,'creategallaryList']);
Route::any('savegallary',[AdminController::class,'savegallary']);
Route::any('editgallary/{id}',[AdminController::class,'editgallary']);
Route::put('updategallary/{id}',[AdminController::class,'updategallary']);
Route::any('deletegallary/{id}',[AdminController::class,'deletegallary']);

Route::any('gallaryshow',[AdminController::class,'gallaryshow']);
		
Route::get('changeStatus', [AdminController::class,'changeStatus']);



Route::any('assetList',[AdminController::class,'assetsType']);
Route::any('createassets',[AdminController::class,'createassetsType']);
Route::any('saveassets',[AdminController::class,'saveassets']);
Route::any('editassets/{id}',[AdminController::class,'editassets']);
Route::put('updateassets/{id}',[AdminController::class,'updateupdateassets']);
Route::any('deleteassets/{id}',[AdminController::class,'deletassets']);


Route::any('assetbrand',[AdminController::class,'assetsbrandList']);
Route::any('createbrand',[AdminController::class,'createassetsBrand']);
Route::any('savebrands',[AdminController::class,'savebrand']);
Route::any('editbrands/{id}',[AdminController::class,'editbrands']);
Route::put('updatebrands/{id}',[AdminController::class,'updatebrands']);
Route::any('deletbrands/{id}',[AdminController::class,'deletbrands']);


Route::any('createModels',[AdminController::class,'createModels']);
Route::any('savemodels',[AdminController::class,'savemodels']);


























Route::group(['middleware' => ['AdminAuth']], function (){
Route::any('Admin/dashboard',[AdminController::class,'dashboard']);
});


Route::group(['middleware' => ['UserAuth']], function (){
   Route::any('user/dashboard',[UserController::class,'dashboard']);
});

