<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
require app_path("Helpers/helper.php");
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Center;
use App\Models\State;
use App\Models\Citys;
use App\Models\Operator;
use App\Models\XrayTypes;
use App\Models\Pages;
use App\Models\Social_media;
use App\Models\ContactUs;
use App\Models\Slider;
use App\Models\Gallary;
use App\Models\Xray_machine;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $data["title"] = "Dashboard";
            $data["nav"] = "dashboard";
            return view("backEnd/dashboard", $data);
        } else {
            $data["title"] = "Admin Login";
            $data["nav"] = "admin";
            return view("backEnd/login", $data);
        }
    }

    
    public function dashboard()
    {
        $data["title"] = "Dashboard";
        $data["nav"] = "dashboard";
        return view("backEnd/dashboard", $data);
    }

    public function userList()
    {
        $data["title"] = "Center List";
        //old code running before paginate// $data["user_list"] = User::where("user_type_id", "3")->get();
        $data["user_list"] = User::where("user_type_id", "3")->paginate(10);
         // echo'<pre>';
         //        print_r($data);die;

        return view("backEnd/userList", $data);
    }
    public function createCenter(Request $request)
    {
        $data["states"] = State::all();

        $data["citys"] = Citys::where("state_id", $request->state_id)->get([
            "city",
            "id",
        ]);
        //////////

        return view("backEnd/createCenter", $data);
    }
    public function saveCenter(Request $request)
    {
        $input = $request->all();
        Center::create($input);

        Session::flash('success',"Data has been Added succesfully");

        return redirect("userList");
    }
    public function editCenter($id)
    {
        $data["title"] = "User List";

        $data["user_list"] = Center::find($id);

        $user_list = Center::find($id);

        $state = getUserInfo($id)->state;

        $data["citys"] = Citys::all();
        $data["states"] = State::all();
        $data["cities"] = Citys::where("state_id", $state)->get();
        // $data['states']  = State::where("country_id",$country)->get();
        return view("backEnd/edit_center", $data);
    }

    public function updateCenterList(Request $request, $id)
    {
        $product_list = Center::find($id);
        $product_list->name = $request->input("name");
        $product_list->email = $request->input("email");
        $product_list->mobile = $request->input("mobile");
        $product_list->state = $request->input("state");
        $product_list->city = $request->input("city");
        $product_list->update();
        Session::flash('update',"Data has been updated succesfully");

        return redirect("userList");
    }
    public function deleteCenterList($id)
    {
        Center::destroy($id);
        Session::flash('error',"Data has been deleted succesfully");

        return redirect("userList");
    }

    public function getCity(Request $request)
    {
        $cities = Citys::where("state_id", $request->state_id)->get();
        $cities_list = "";
        $cities_list .= '<option value="">select city</option>';
        foreach ($cities as $value) {
            $cities_list .=
                '<option value="' .
                $value->id .
                '">' .
                $value->city .
                "</option>";
        }
        $responce = ["cities_list" => $cities_list];
        echo json_encode($responce);
        die();
    }
    public function getState(Request $request)
    {
        State::where("country_id", $request->country_id)->get();
        $states_list = "";
        $states_list .= '<option value="">select city</option>';
        foreach ($states as $value) {
            $states_list .=
                '<option value="' .
                $value->id .
                '">' .
                $value->name .
                "</option>";
        }
        $responce = ["states_list" => $states_list];
        echo json_encode($responce);
        die();
    }
    public function operatorList()
    {
        $data["title"] = "OperatorList";
        $data["operator_list"] = User::where("user_type_id", 4)
            ->where("status", 1)
            ->get();

        return view("backEnd/operatorlist", $data);
    }
    public function createOperator(Request $request)
    {
        $data["user_list"] = User::where("user_type_id", "3")->get();
        
        return view("backEnd/createOperator", $data);
    }

    public function saveOperator(Request $request)
    {
        $input = $request->all();
        //print_r($request->all()); die;
        User::create($input);
        Session::flash('success',"Data has been Added succesfully");

        return redirect("OperatorList");
    }
    public function editOperator($id)
    {
        $data["title"] = "Operator List";
        $data["operator_list"] = User::find($id);
        $operator_list = User::find($id);
        // $data['states']  = State::where("country_id",$country)->get();
        return view("backEnd/edit_Operator", $data);
    }

    public function updateOperatorList(Request $request, $id)
    {
        $product_list = User::find($id);
        $product_list->name = $request->input("name");
        $product_list->email = $request->input("email");
        $product_list->mobile = $request->input("mobile");
        // $product_list->status = $request->input("status");
        // $product_list->center_id = $request->input("center_id");
        $product_list->update();
       Session::flash('update',"Data has been update succesfully");

        return redirect("OperatorList");
    }
     public function deleteOperatorlist($id)
    {
        User::destroy($id);
        Session::flash('error',"Data has been deleted succesfully");

        return redirect("OperatorList");
    }
    public function doctorList()
    {
        $data["title"] = "Doctor List";
        $data["doctor_list"] = User::where("user_type_id", "5")->get();
        return view("backEnd/doctorList", $data);
    }
    public function createDoctor(Request $request)
    {
        $data["doctor_list"] = User::where("user_type_id", "5")->get();
        return view("backEnd/createDoctor", $data);
    }

    public function saveDoctor(Request $request)
    {
        $input = $request->all();
        //print_r($request->all()); die;
        User::create($input);
        Session::flash('success',"Data has been Added succesfully");

        return redirect("doctorList")->with(
            "flash_message",
            "Doctor Addedd successfully!"
        );
    }

    public function editDoctor($id)
    {
        $data["title"] = "Doctor List";
        $data["doctor_list"] = User::find($id);
        $doctor_list = User::find($id);
        return view("backEnd/editDoctor", $data);
    }
    public function updateDoctorList(Request $request, $id)
    {
        $product_list = User::find($id);
        $product_list->name = $request->input("name");
        $product_list->email = $request->input("email");
        $product_list->mobile = $request->input("mobile");
        $product_list->password = $request->input("password");
        $product_list->update();
         Session::flash('update',"Data has been updated succesfully");
      
        return redirect("doctorList");
    }
    public function deleteDoctor($id)
    {
        User::destroy($id);
       Session::flash('error',"Data has been Deleted succesfully");

        return redirect("doctorList");
    }
    public function userLists()
    {
        $data["title"] = "User Lists";
        $data["user_listing"] = User::where("user_type_id", "2")->paginate(10);
        return view("backEnd/userLists", $data);
    }
    public function createUser(Request $request)
    {
        $data["states"] = State::all();

        $data["citys"] = Citys::where("state_id", $request->state_id)->get([
            "city",
            "id",
        ]);

        return view("backEnd/createUser", $data);
    }
    public function saveUser(Request $request)
    {
        $input = $request->all();
        Center::create($input);
        Session::flash('success',"Data has been Added succesfully");

        return redirect("userLists");
    }
    public function edituser($id)
    {
        $data["title"] = "User Lists";

        $data["user_listing"] = Center::find($id);

        $user_listing = Center::find($id);

        $state = getUserInfo($id)->state;

        $data["citys"] = Citys::all();
        $data["states"] = State::all();
        $data["cities"] = Citys::where("state_id", $state)->get();
        // $data['states']  = State::where("country_id",$country)->get();
        return view("backEnd/edituser", $data);
    }
    public function updateuserList(Request $request, $id)
    {
        $product_list = Center::find($id);
        $product_list->name = $request->input("name");
        $product_list->email = $request->input("email");
        $product_list->mobile = $request->input("mobile");
        $product_list->state = $request->input("state");
        $product_list->city = $request->input("city");
        $product_list->update();
        Session::flash('update',"Data has been updated succesfully");

        return redirect("userLists");
    }
    public function deleteuser($id)
    {
        User::destroy($id);
        Session::flash('error',"Data has been deleted succesfully");

        return redirect("userLists");
    }
    public function xrayList()
    {
        $data["title"] = "XrayTypes";

        $data["xray_type"] = XrayTypes::where("status", 1)->paginate(10);

        return view("backEnd/xrayLists", $data);
    }
     public function createXraytypes(Request $request)
    {
        $data["xray_type"] = XrayTypes::all();
        return view("backEnd/createXraytype", $data);
    }
     public function saveXraytypes(Request $request)
    {
        $input = $request->all();
        XrayTypes::create($input);
        Session::flash('success',"Data has been Added succesfully");
        return redirect("xrayList");
    }
    public function editXraytypes($id)
    {
        $data["title"] = "X-Ray List";
        $data["xray_type"] = XrayTypes::find($id);
        $xray_type = XrayTypes::find($id);
        return view("backEnd/editXraytypes", $data);
    }
    public function updateXraytypes(Request $request, $id)
    {
        $product_list = XrayTypes::find($id);
        $product_list->type_name = $request->input("type_name");
        $product_list->status = $request->input("status");
        $product_list->update();
        Session::flash('update',"Data has been updated succesfully");

        return redirect("xrayList");
    }
    public function deleteXraytypes($id)
    {
        XrayTypes::destroy($id);
        Session::flash('error',"Data has been deleted succesfully");

        return redirect("xrayList");
    }
    public function pageList()
    {
        $data["title"] = "Manage Page";
        $data["page_list"] = Pages::all();
        return view("backEnd/pageList", $data);
    }
    public function createpages(Request $request)
    {
        $data["page_list"] = Pages::all();
        return view("backEnd/createPage", $data);
    }
     public function savepage(Request $request)
    {
        $input = $request->all();
        Pages::create($input);
        Session::flash('success',"Data has been Added succesfully");
        return redirect("pageList");
    }
     public function editpages($id)
    {
        $data["title"] = "Page List";
        $data["page_list"] = Pages::find($id);
        $page_list = Pages::find($id);
        return view("backEnd/editpages", $data);
    }

    public function updatepages(Request $request, $id)
    {
        $product_list = Pages::find($id);
        $product_list->page_title = $request->input("page_title");
        $product_list->page_description = $request->input("page_description");
        $product_list->status = $request->input("status");
        $product_list->update();
        Session::flash('update',"Data has been deleted succesfully");

        return redirect("pageList");
    }
    public function deletepages($id)
    {
        Pages::destroy($id);
        Session::flash('error',"Data has been deleted succesfully");

        return redirect("pageList");
    }
     public function socialmediaList()
    {
        $data["title"] = "Social Media Links";
        $data["social_list"] = Social_media::all();
        return view("backEnd/sociallist", $data);
    }
     public function createsocialmediaLink(Request $request)
    {
        $data["social_list"] = Social_media::all();
        return view("backEnd/createsociallinks", $data);
    }
     public function savelink(Request $request)
    {
        $input = $request->all();
        Social_media::create($input);
        Session::flash('success',"data has been created succesfully");

        return redirect("socialmediaList");
    }
     public function editlinks($id)
    {
        $data["title"] = "Social Media Links";
        $data["social_list"] = Social_media::find($id);
        $social_list = Social_media::find($id);
        return view("backEnd/editsociallinks", $data);
    }
     public function updatesociallinks(Request $request, $id)
    {
        $product_list = Social_media::find($id);
        $product_list->title = $request->input("title");
        $product_list->link = $request->input("link");
        $product_list->status = $request->input("status");
        $product_list->update();
        Session::flash('update',"data has been updated succesfully");

        return redirect("socialmediaList");
    }
    public function deletesociallinks($id)
    {
        Social_media::destroy($id);
       Session::flash('error', "Data has been deleted succesfully");

        return redirect("socialmediaList");
    }
      public function contactusList()
    {
        $data["title"] = "ContactUs";
        $data["contact_list"] = ContactUs::all();
        return view("backEnd/contactuslist", $data);
    }
      public function createcontactusList(Request $request)
    {
        $data["contact_list"] = ContactUs::all();
        return view("backEnd/createcontactus", $data);
    }
     public function savecontactuslist(Request $request)
    {
        $input = $request->all();
        ContactUs::create($input);
      Session::flash('success', "contact list has been Added succesfully !!");
     return redirect("contactusList");   
     }
      public function editcontactus($id)
    {
        $data["title"] = "ContactUs";
        $data["contact_list"] = ContactUs::find($id);
        $contact_list = ContactUs::find($id);
        return view("backEnd/editcontactus", $data);
    }
    public function updatecontactus(Request $request, $id)
    {
        $product_list = ContactUs::find($id);
        $product_list->name = $request->input("name");
        $product_list->email = $request->input("email");
        $product_list->subject = $request->input("subject");
        $product_list->message = $request->input("message");
        $product_list->update();
      Session::flash('update', "Contact List has been Updated succesfully !!");

        return redirect("contactusList");
    }
    public function deletecontactuslist($id)
    {
      ContactUs::destroy($id);
       Session::flash('error', "Contact List has been deleted succesfully !!");

        return redirect("contactusList");
    }
      public function sliderlist()
    {
        $data["title"] = "Slider List";
        $data["slider_list"] = Slider::all();
        return view("backEnd/sliderlist", $data);
    }
      public function createsliderList(Request $request)
    {
        $data["slider_list"] = Slider::all();
        return view("backEnd/createslider", $data);
    }
       public function saveslider(Request $request)
    {
    $file = $request->file('image');
    $image = time() . '.' . $file->getClientOriginalExtension();
     $file->storeAs('public\images', $image); 

    $empData = ['title' => $request->title, 'status' => $request->status, 'image' => $image];
    Slider::create($empData);
    return redirect('sliderList'); 
     }
      public function editslider($id)
    {
        $data["title"] = "Slider List";
        $data["slider_list"] = Slider::find($id);
        $slider_list = Slider::find($id);
        return view("backEnd/editslider", $data);
    }
    public function updateslider(Request $request,$id) {
    $fileName = '';

    $emp = Slider::find($request->id);
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $fileName = time() . '.' . $file->getClientOriginalExtension();
      $file->storeAs('public\images', $fileName);
      if ($emp->image) {
    storage::delete('public\images' . $emp->image);
  
    }
}
else{
      $fileName = $emp->image; } 

    $empData=['title'=>$request->title, 'status'=>$request->status, 'image'=>$fileName];

    $emp->update($empData);
    return redirect('sliderList'); 

      }
    
       public function deletesliderlist($id)
    {
      Slider::destroy($id);
       Session::flash('error', "slider List has been deleted succesfully !!");

        return redirect("sliderList");
    }
     public function gallaryList()
    {
        $data["title"] = "Gallary List";
        $data["gallary_list"] = Gallary::all();
        return view("backEnd/gallarylist", $data);
    }
      public function creategallaryList(Request $request)
    {
        $data["gallary_list"] = Gallary::all();
        return view("backEnd/creategallary", $data);
    }
    public function savegallary(Request $request)
    {
    $file = $request->file('image');
    $image = time() . '.' . $file->getClientOriginalExtension();
     $file->storeAs('public\images', $image); 

    $empData = ['title' => $request->title, 'status' => $request->status, 'image' => $image, 'link'=>$request->link];
    Gallary::create($empData);
    Session::flash('success', "Gallary has been Added succesfully !!");
    return redirect('gallaryList'); 
     }
    public function editgallary($id)
    {
        $data["title"] = "Gallary List";
        $data["gallary_list"] = Gallary::find($id);
        $gallary_list = Gallary::find($id);
        return view("backEnd/editgallary", $data);
    }
     public function updategallary(Request $request, $id) {
    $fileName = '';

    $emp = Gallary::find($request->id);
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $fileName = time() . '.' . $file->getClientOriginalExtension();
      $file->storeAs('public\images', $fileName);
      if ($emp->image) {
    storage::delete('public\images' . $emp->image);
      }
      
    } else{
      $fileName = $emp->image; } 


    $empData=['title'=>$request->title, 'status'=>$request->status, 'link'=>$request->link, 'image'=>$fileName];

    $emp->update($empData);
    return redirect('gallaryList'); 

      }
    public function deletegallary($id)
   {

       Gallary::destroy($id);
       Session::flash('error', "gallary List has been deleted succesfully !!");

        return redirect("gallaryList");
    }
     
     public function gallaryshow()
    {
        $data["title"] = "Gallary List";
        $data["gallary_list"] = Gallary::all();
        return view("backEnd/gallaryshow", $data );
    }
         public function analytics()
    {
        $data["title"] = "Analytics";


        return view("backEnd/analytics");
    }
     public function sales()
    {
        $data["title"] = "Sales";


        return view("backEnd/sales");
    }
 public function profile()
    {
        $data["title"] = "Profile";


        return view("backEnd/account_info");
    }
     public function xraymachineList()
    {
        $data["title"] = "X-ray Machine Name";

        $data["machine_name"] = Xray_machine::where("status", 1)->paginate(10);

        return view("backEnd/xraymachineList", $data);
    }
     public function createXraymachine(Request $request)
    {
        $data["machine_name"] = Xray_machine::all();
        return view("backEnd/createnewMachine", $data);
    }

     public function saveXrayname(Request $request)
    {
        $input = $request->all();
        Xray_machine::create($input);
        Session::flash('success',"data has been created succesfully");

        return redirect("xraymachineList");



    }
    public function editmachineName($id)
    {
        $data["title"] = "X-ray Machine Name";
        $data["machine_name"] = Xray_machine::find($id);
        $machine_name = Xray_machine::find($id);
        return view("backEnd/editmachinename", $data);
    }
    public function updateMachinenames(Request $request, $id)
    {
        $name_list = Xray_machine::find($id);
        $name_list->machine_name = $request->input("machine_name");
        $name_list->status = $request->input("status");
        $name_list->model = $request->input("model");
        $name_list->description = $request->input("description");
        $name_list->update();
        Session::flash('update',"Data has been updated succesfully");

        return redirect("xraymachineList");
    }
public function deletemachinenames($id)
    {
        Xray_machine::destroy($id);
        Session::flash('error',"Data has been deleted succesfully");

        return redirect("xraymachineList");
    }
     

  }
