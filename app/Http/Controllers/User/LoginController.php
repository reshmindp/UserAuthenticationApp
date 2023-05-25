<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{
    public function login_page()
    {
        return view('user/login');
    }

    public function getlogin_info()
    {
        
        $validator= Validator::make(request()->all(),
                        ['email' => 'required|email']);
                        
        $request = request()->except('_token');

        if($validator->passes())
        {
            $user_info = User::where('email','=', $request['email'])->first();

            if($user_info)
            {
                //$qrCode = QrCode::size(250)->generate($user->toJson());
                $qrCode = QrCode::size(250)->generate(route('user.show', ['userId' => $user_info->user_id]));

                return view('user/qr-code-page', compact('qrCode', 'user_info'));

            }
            else
            {
                session()->flash('error', 'Entered email id is not registered!');
                return redirect(route('user.login.page'));
            }

        }
        else
        {
            return back()->withInput()->withErrors($validator);
        }
    }

    public function download_qrcode(Request $request)
    {
        
        $email = $request->input('email');
        $userInfo = User::where('email', $email)->first();
        
        $qrCode = QrCode::size(250)->generate(route('user.show', ['userId' => $userInfo->user_id]));

        $tmpFilePath = public_path('/qrcode.png');

        file_put_contents($tmpFilePath, $qrCode);

        $headers = [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="qrcode.png"',
        ];

        // Create a response with the file content
        return response()->file($tmpFilePath, $headers);

        // $response = Response::make($qrCode);
        // $response->header('Content-Type', 'image/png');
        // $response->header('Content-Disposition', 'attachment; filename="qrcode.png"');

        return $response;

    }

}
