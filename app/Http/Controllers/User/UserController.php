<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register_page()
    {
        return view('user/registration');
    }

    public function registration()
    {
        $messages= ['required' => '* Required'];

        $validator= Validator::make(request()->all(),
                        ['name' => 'required|string',
                        'lastname' => 'required|string',
                        'email' => 'required|email', $messages]);

        $request = request()->except('_token');

        if($validator->passes())
        {
            $userCount = User::where('email', '=' , $request['email'])->first();

            if($userCount)
            {
                echo json_encode(array('status'=>'error', 'message'=> 'User email already registered!'));
            }
            else
            {
                $userData = array('name' => $request['name'], 'lastname' => $request['lastname'], 'email'=>$request['email']);
            
                User::create($userData);

                echo json_encode(array('status'=>'success', 'message'=> 'User registration success!'));

            }

        }

        else
        {
            echo json_encode(array('status'=>'error', 'message'=> $validator->errors()->first()));
        }
    }

    public function list_all_users()
    {
        $users = User::all();
        
        return view('user/list-all-users',compact('users'));
    }

        
    
}
