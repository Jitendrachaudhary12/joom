<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
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

       public function getLogout(){
        Auth::logout();
        return redirect('admin/login');
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
                return redirect()->intended('admin/dashboard');
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
}
