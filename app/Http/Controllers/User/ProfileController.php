<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show_info()
    {
        $urlId = request()->query('userId');

        $userInfo = User::where('user_id', $urlId)->first();

        return view('user/profile',compact('userInfo'));
    }

    public function update_profile_image(Request $request)
    {

        $img_name = 'img_'.time().'.'.$request->profile_picture->getClientOriginalExtension();
        $request->profile_picture->move(public_path('uploads/profile_picture/'), $img_name);
        $imagePath = 'uploads/profile_picture/'.$img_name;
        $data = array('profile_picture'=> $imagePath); 
        
        //$update = User::find($request->user_id)->update($data);
        
        $update = DB::table('users')->where('user_id', $request->user_id)->update($data);  

        @unlink(public_path($request->old_profile_picture));

        if($update)
        {
            $response['success'] = true;
            $response['message'] = 'Success! Record Updated Successfully.';
        }
        else
        {
            $response['success'] = false;
            $response['message'] = 'Error! Record Not Updated.';
        }
        return $response;

    }

    public function update_profile()
    {
        $messages= ['required' => '* Required'];

        $validator= Validator::make(request()->all(),
                        ['name' => 'required|string',
                        'lastname' => 'required|string',
                        'email' => 'required|email', $messages]);

        $request = request()->except('_token');

        if($validator->passes())
        {
            $userData = array('name' => $request['name'], 'lastname' => $request['lastname'], 'email'=>$request['email']);
            
            DB::table('users')->where('user_id', $request['user_id'])->update($userData);  
            

            echo json_encode(array('status'=>'success', 'message'=> 'User profile updated successfully!'));

        }

        else
        {
            echo json_encode(array('status'=>'error', 'message'=> $validator->errors()->first()));
        }
    }
}
