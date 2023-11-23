<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Task;
use Auth;
use DB;
use Response;
use Session;
// use App\Http\Requests\UsersRequest as StoreRequest;
// use App\Http\Requests\UsersRequest as UpdateRequest;
use App\Http\Controllers\CrudOverrideController;

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Str;
use App\Exports\TaskExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
        private $URI_PLACEHOLDER;

    private $jsondata;
    private $redirect;
    protected $message;
    protected $status;
    private $prefix;

    public function __construct(){
        $this->jsondata     = [];
        $this->message      = false;
        $this->redirect     = false;
        $this->status       = false;
        $this->prefix       = \DB::getTablePrefix();
        $this->URI_PLACEHOLDER = \Config::get('constants.URI_PLACEHOLDER');
    }

    public function login(Request $request) {
        Auth::check();
        // dd('f');
        if (\Auth::check())
        {
            return redirect()->intended('admin');
        }
        $data['title'] = 'Admin Login';
        return view('admin.auth.login')->with($data);
    }  
      public function loginUser(Request $request) {
        Auth::check();
        // dd('f');
        if (\Auth::check())
        {
            return redirect()->intended('user');
        }
        $data['title'] = 'User Login';
        return view('user.auth.login')->with($data);
    }
     public function userChangePass(Request $request) {
        Auth::check();
        // dd('f');
        if (\Auth::check())
        {
            // return redirect()->intended('user');
                  $data['title'] = 'User Change password';
        return view('user.auth.change_password')->with($data);
        }
  
    }

       public function getLogout(){
        Auth::logout();
        return redirect('admin/login');
    }
   public function getLogoutUser(){
        Auth::logout();
        return redirect('user/login');
    }

        public function forgotPassword(){
        return view('pages.auth.forgot');
    }

      public function authenticate(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
            'password' =>'required'
        ],[
            'email.required' => 'Please enter email address.',
            'email.email' => 'Please enter valid email address.',
            'password.required' => 'Please enter password.'
        ]);

        $validator->after(function($validator) use(&$user, $request) {
            $user = User::where('email', $request->email)->whereIn('status',['inactive','trashed'])->first();
            if($user){
                $validator->errors()->add('email', 'Your account is not active, Please contact Administrator');
            }
        });
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            if(Auth::guard('web')->attempt(['email' => $request->email,'password' => $request->password])){
                // dd("yes");
                // dd(auth()->user());
                return redirect()->intended('admin/dashboard');
            }
            else{
                $validator->errors()->add('password', 'Invalid credentials!');
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
    } 
      public function userAuthenticate(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
            'password' =>'required'
        ],[
            'email.required' => 'Please enter email address.',
            'email.email' => 'Please enter valid email address.',
            'password.required' => 'Please enter password.'
        ]);

        $validator->after(function($validator) use(&$user, $request) {
            $user = User::where('email', $request->email)->whereIn('status',['inactive','trashed'])->first();
            if($user){
                $validator->errors()->add('email', 'Your account is not active, Please contact Administrator');
            }
        });
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            if(Auth::guard('web')->attempt(['email' => $request->email,'password' => $request->password])){
                User::where('id',Auth::guard('web')->user()->id)->update(['last_login'=>date('Y-m-d h:s:i')]);
               $user= User::where('id',Auth::guard('web')->user()->id)->where('admin_pass','=','yes')->first();
               $user_check= User::where('id',Auth::guard('web')->user()->id)->first();
               
                    $c_date= date("d-m-Y"); 
                    $date1 = new \DateTime($c_date);  
                    $date2 = new \DateTime($user_check->password_time);  

                    $diff = $date1->diff($date2)->format("%a");  
                    $days = intval($diff); 
                 if($user){
                // return redirect()->intended('user_change_pass');
                 return redirect()->route('user_change_pass')->with('active','Please change admin password');
               }
               else if($days>=30){
                    return redirect()->route('user_change_pass')->with('active','Please change password for security reason');
               }
               else{
                return redirect()->intended('user/dashboard');
               }
            }
            else{
                $validator->errors()->add('password', 'Invalid credentials!');
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
    }

     public function index(Request $request){

        return view('admin.dashboard');
    }  

    public function userindex(Request $request){

        return view('user.dashboard');
    }

    public function users(Request $request){

       $users= User::where('is_admin','<>',1)->where('user_role','<>',1);
        $parameters=$request->str;
        if($parameters!=''){
          $users=$users->where('users.name','LIKE',$parameters.'%')->orwhere('users.email','LIKE',$parameters.'%');
        } 
      $users=  $users->get();
        return view('admin.users',compact('users'));
    }  
     public function tasks(Request $request){
       $tasks=   Task::get();

        return view('admin.task',compact('tasks'));
    } 
     
      public function userTasks(Request $request){
     $tasks=   Task::where('user_id',Auth::guard('web')->user()->id)->get();
        return view('user.task',compact('tasks'));
    } 
     public function addUsers(Request $request){
        return view('admin.add_user');
    }
 public function addTasks(Request $request){
        return view('user.add_task');
    }

    public function autoGen(Request $request){
      // $str_random=str_random(8);
    $str_random=  Str::random(8);
    // dd($str_random);
         return response()->json([
            'message' => 'generated Successfully',
            'data' => $str_random,
            'status' => 'true',
            'class_name' => 'alert-success',
        ]);
    }

    public function addUsersPost(Request $request){
        // dd($request->all());

         $validator = \Validator::make($request->all(), [
            'name'    =>  'required|max:50',
            'last_name'    =>  'required|max:50',
            'phone'     =>  'required|numeric|unique:users,phone',
            'email'     =>  'required|email|max:50|unique:users,email',
            'password' => 'required|min:8',
            // 'password' => 'required|confirmed|min:8',
            // confirmed
        ],
        [
            'phone.required'=>'Please enter mobile number',
            'phone.numeric'=>'Please enter number',
            'phone.unique'=>'Please enter different mobile number',
            'email.required'=>'Email is required',
            'email.email'=>'Email is not valid',
            'email.unique'=>'Email is already used',
            'password.required'=>'Password is required',
            'password.min'=>'Password length should be 8 character',
          
        ]
    );

        $validator->after(function($validator) use($request) {
              if (strlen($request->phone) < 10 || strlen($request->phone) >10) {
                $validator->errors()->add('phone', 'Please enter valid mobile number');
            } 
        });
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

            $user['name']=$request->name;
            $user['last_name']=$request->last_name;
            $user['is_admin']=0;
            $user['phone']=$request->phone;
            $user['email']=$request->email;
            $user['admin_pass']='yes';
            $user['password_time']=date('Y-m-d');
            $user['user_role']=2;
            $user['password']=bcrypt($request->password);

            $user12['name']=$request->name;
            $user12['last_name']=$request->last_name;
            $user12['phone']=$request->phone;
            $user12['email']=$request->email;
            $user12['password']=$request->password;
            $user12['site']='Joom';

             $statius = ___mail_sender($user['email'],$user12);


             $users=User::create($user);


         return redirect()->route('users')->with('active','User added Successfully.');
    }

    public function addTaskPost(Request $request){

            $validator = \Validator::make($request->all(), [
            'start_time'    =>  'required',
            'stop_time'    =>  'required',
            'notes'     =>  'required|max:50',
            'description'     =>  'required|max:100'
        ],
        [
            'start_time.required'=>'Start time is required',
            'stop_time.required'=>'Stop time is required',
            'notes.required'=>'Notes is required',
            'notes.max'=>'Notes cant be more than 50 character',
            'description.required'=>'Description is required',
            'description.max'=>'Description cant be more than 100 character',
        ]
    );

       
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

            $task['start_time']=$request->start_time;
            $task['stop_time']=$request->stop_time;
            $task['notes']=$request->notes;
            $task['description']=$request->description;
            $task['user_id']=Auth::guard('web')->user()->id;
          

             $users=Task::create($task);

         return redirect()->route('tasks')->with('active','Task added Successfully.');

    }

    public function change_password(Request $request){

          $validator = \Validator::make($request->all(), [
            // 'password' => 'required|min:8',
            'password' => 'required|confirmed|min:8',
            // confirmed
        ],
        [
            'password.required'=>'Password is required',
            'password.min'=>'Password length should be 8 character',
          
        ]
    );

            // $validator->after(function($validator) use($request) {
            // if ($request->password != $request->password_confirmation) {
            // $validator->errors()->add('password_confirmation', 'Password and confirm password must be same');
            // } 
            // });
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
           $pass['password']=bcrypt($request->password);
           $pass['admin_pass']='';
           $pass['password_time']=date('Y-m-d');
          $users=User::where('id',Auth::guard('web')->user()->id)->update($pass);
           
           return redirect()->intended('user/dashboard');
    }

    public function exportTask(Request $request){
        return Excel::download(new TaskExport, 'task'.date('d-m-Y H:i:s').'.csv');   
    }
}
