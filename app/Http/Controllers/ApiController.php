<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Common_model;
use App\Models\State;
use App\Models\Citys;
use App\Models\User;
use App\Models\XrayTypes;
use App\Models\UserLocations;
use App\Models\Booking;
use App\Models\CenterBookings;
use Validator;



class ApiController extends Controller
{
   
    public function __construct()
    {
        //$this->middleware('auth:api');
   
    }

    public function stateList()
    {
        $states = State::all();
        return response()->json([
            'status' => 'success',
            'state_list' => $states,
        ]);
    }

    public function cityList($id)
    {
        $city = Citys::where('state_id',$id)->get();
        return response()->json([
            'status' => 'success',
            'city_list' => $city,
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $user = User::where('id', $request->id)->where('otp',$request->otp)->first();
        if(!empty($user->id)){
            return response()->json([
                'status' => 'success',
                'message' => 'otp successfully verify',
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'otp verification failed',
            ]);
        }
    }

    public function forgotPassword(Request $request){

        $user = User::where('mobile', $request->mobile)->orwhere('email', $request->mobile)->first();
        
        if(!empty($user->id)){
            $user->forgot_otp = '1234';
            $user->save();
            return response()->json([
                'status' => 'success',
                'user_id' => $user->id,
                'mobile_no' => $user->mobile,
                'otp' => 1234,
                'message' => 'Otp successfully send to your mobile number and email id',
            ]);
        }else{
            return response()->json([
            'status' => 'failed',
            'user_id' => '',
            'message' => 'you have dont any account registered on this number or email id',
            ]);
        }
   }


    public function verifyForgotOtp(Request $request){
        $user = User::where('id', $request->user_id)->Where('forgot_otp', $request->forgot_otp)->first();
        
        if(!empty($user->id)){
             $user->forgot_otp = '';
            $user->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Otp successfully verifyed',
                'user_details' => $user,
            ]);
            
        }else{
           return response()->json([
            'status' => 'failed',
            'message' => 'dont verify your otp',
            'user_details' => '',
            ]);
        }
   }
    public function userProfile($id) {
        $user = User::where('id',$id)->first();
        if(!empty($user->id)){
            return response()->json([
                'status' => 'success',
                'user_details' => $user,
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'user_details' => '',
            ]);
        }
        
    }

    public function updatePassword(Request $request) {
        $user = User::find($request->user_id);
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'User Password updated successfully',
            'user_details' => $user,
        ]);
        
    }
    
    public function updateUserProfile(Request $request){
        $user = User::find($request->user_id);


        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile_img = $imageName;

        $user->save();
        return response()->json([
            'status' => 'success',
            'message' => 'User profile successfully updated',
        ]);
    }

    public function xrayTypes(Request $request) {
        $xray_types = XrayTypes::where('status',1)->get();
        if($xray_types){
            return response()->json([
            'status' => 'success',
            'xray_types' => $xray_types,
        ]);
        }else{
            return response()->json([
            'status' => 'failed',
            'user_details' => '',
        ]);    
        }
    }

    public function addLocation(Request $request) {
        
        $user_location = UserLocations::create([
            'user_id' => $request->user_id,
            'location_type' => $request->location_type,
            'full_location' => $request->full_location,
            'door_block_no' => $request->door_block_no,
            'appartment_road_area' => $request->appartment_road_area,
            'direction_to_reach' => $request->direction_to_reach,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => 1,
        ]);

        if($user_location){
            return response()->json([
            'status' => 'success',
            'user_location' => $user_location,
        ]);
        }else{
            return response()->json([
            'status' => 'failed',
            'user_location' => '',
        ]);    
        }
    }
    
    public function userLocations($id) {
        $userLocations = UserLocations::where('user_id',$id)->get();
        if(!empty($userLocations)){
            return response()->json([
                'status' => 'success',
                'user_locations' => $userLocations,
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'user_locations' => '',
            ]);
        }
    }

    public function AddBooking(Request $request) {
        $booking = Booking::create([
            'user_id' => $request->user_id,
            'booking_location' => $request->booking_location,
            'booking_latitude' => $request->booking_latitude,
            'booking_longitude' => $request->booking_longitude,
            'xray_type_id' => $request->xray_type_id,
            'investigation_required' => $request->investigation_required,
            'images' => $request->images,
            'description' => $request->description,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'booking_amount' => $request->booking_amount,
            'payment_mode' => $request->payment_mode,
            'payment_status' => 0,
            'booking_status' => 0,
        ]);
        
        $centerData = DB::table("users")->select("users.id",DB::raw("6371 * acos(cos(radians(" .$request->booking_latitude. "))* cos(radians(users.latitude))* cos(radians(users.longitude) - radians(" .$request->booking_longitude. "))+ sin(radians(" .$request->booking_latitude. "))* sin(radians(users.latitude))) AS distance"))->where("user_type_id",3)->where("status",1)->orderBy("distance", "asc")->first();

        $centerBooking =  CenterBookings::create([
            'center_id' => $centerData->id,
            'booking_id' => $booking->id,
            'status' => 0,
        ]);

        $requestId = DB::table('booking_requested_centers')->insert(array('booking_id'=> $booking->id, 'center_id'=> $centerData->id));

        if($booking){
            return response()->json([
            'status' => 'success',
            'booking_details' => $booking,
        ]);
        }else{
            return response()->json([
            'status' => 'failed',
            'booking_details' => '',
        ]);    
        }
    }

    public function bookingDetails($id) {
        $bookingDetails = Booking::where('id',$id)->get();
        if(!empty($bookingDetails)){
            return response()->json([
                'status' => 'success',
                'booking_details' => $bookingDetails,
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'booking_details' => '',
            ]);
        }
    }

    public function centerBookingList($id){
       // $centerBookings =  CenterBookings::where('center_id',$id)->whereIn('status',[0,1])->get();

        $centerBookings = DB::table('user_bookings')
            ->where('center_bookings.center_id', $id )
            ->whereIn('center_bookings.status', [0,1])
            ->leftJoin('center_bookings', 'user_bookings.id', '=', 'center_bookings.booking_id')
            ->select('user_bookings.*', 'center_bookings.center_id', 'center_bookings.assigned_oprator_id', 'center_bookings.status')
            ->get();


          if(!empty($centerBookings)){
            return response()->json([
                'status' => 'success',
                'center_bookings' => $centerBookings,
            ]);
          }else{
                return response()->json([
                    'status' => 'failed',
                    'center_bookings' => '',
                ]);
          }
    }

    public function updateCenterlocation(Request $request){

        $user = User::find($request->user_id);

        $user->state = $request->state;
        $user->city = $request->city;
        $user->location = $request->location;
        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;

        $user->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Center location successfully updated',
        ]);

    }

    public function addOperator(Request $request){
        $image = $request->file('profile_image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);

        $opratorDetails = User::create([
            'center_id' => $request->center_id,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'user_type_id' => 4,
            'profile_img' => $imageName,
            'status' => 1,
        ]);

        if($opratorDetails){
            return response()->json([
            'status' => 'success',
            'opratorDetails' => $opratorDetails,
        ]);
        }else{
            return response()->json([
            'status' => 'failed',
            'opratorDetails' => '',
        ]);    
        }
    }

    public function operatorList($id){
          $operatorList =  User::where('center_id',$id)->where('user_type_id',4)->where('status',1)->get();
          if(!empty($operatorList)){
            return response()->json([
                'status' => 'success',
                'operatorList' => $operatorList,
            ]);
          }else{
                return response()->json([
                    'status' => 'failed',
                    'operatorList' => '',
                ]);
          }
    }

    public function doctorList(){
          $doctorList =  User::where('user_type_id',5)->where('status',1)->get();
          if(!empty($doctorList)){
            return response()->json([
                'status' => 'success',
                'doctorList' => $doctorList,
            ]);
          }else{
                return response()->json([
                    'status' => 'failed',
                    'doctorList' => '',
                ]);
          }
    }


    public function centerDashbord(){
          $dashbordList =  array('TodayBookings'=>'20','PendingBookings'=>'18','UnassignedBookings'=>'12','OperatorBuckets'=>'7','ToReceive'=>'25','UnassignedBookings'=>'10','DoctorBuckets'=>'5','Completedbookings'=>'13');
          if(!empty($dashbordList)){
            return response()->json([
                'status' => 'success',
                'dashbordList' => $dashbordList,
            ]);
          }else{
                return response()->json([
                    'status' => 'failed',
                    'dashbordList' => '',
                ]);
          }
    }

    public function operatorDashbord(){
          $dashbordList =  array('TodayBookings'=>'20','PendingBookings'=>'18','ToReceive'=>'25','Completedbookings'=>'13');
          if(!empty($dashbordList)){
            return response()->json([
                'status' => 'success',
                'dashbordList' => $dashbordList,
            ]);
          }else{
                return response()->json([
                    'status' => 'failed',
                    'dashbordList' => '',
                ]);
          }
    }

    public function doctorDashbord(){
          $dashbordList =  array('BookingList'=>'20','BookingsStatus'=>'18','PaymentStatus'=>'12','AssignedCenterList'=>'7','DownloadReport'=>'25','ContactUs'=>'10');
          if(!empty($dashbordList)){
            return response()->json([
                'status' => 'success',
                'dashbordList' => $dashbordList,
            ]);
          }else{
                return response()->json([
                    'status' => 'failed',
                    'dashbordList' => '',
                ]);
          }
    }                                         

}

