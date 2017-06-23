<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use GuzzleHttp\Client;
use Hash;

class UserController extends Controller
{
    public function show(){
        $client = new Client();
        $province = $client->request('GET', 'http://api.rajaongkir.com/starter/province', [
            'headers' => [
                'key' => ['63eca030a065eac7a31580c94ff5c07e']
            ],
        ]);
        $responseBody = json_decode($province->getBody()->getContents(), true);
        $provinces = $responseBody['rajaongkir']['results'];
        
        return view('myprofile', compact('provinces'));
    }
    
    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|max:16|confirmed',
        ]);
        $user = new User();
        $user['email'] = $request->email;
        $user['password'] = bcrypt($request->password);
        $user->save();
        $userLogin = array(
           'email' => $request->email,
           'password' => $request->password
        );
        Auth::attempt($userLogin);
        return redirect()->route('myprofile');
    }
    
    public function login(Request $request) {
        $userLogin = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if(Auth::attempt($userLogin)){
            return redirect()->route('myprofile');
        }
        else return redirect('login');
    }
    
    public function edit(Request $request, $id) {
        $user = User::findorfail($id);
        $user['name'] = $request->name;
        $user['phone'] = $request->phone;
        $user->save();

        return back();
    }
    
    public function editaddress(Request $request, $id){
        $user = User::findOrFail($id);
        $user['address'] = $request->address;
        $user['city'] = $request->city;
        $user['state'] = $request->state;
        $user['postal_code'] = $request->postal_code;
        $user->save();

        return back();
    }
    
    public function changepassword(Request $request, $id) {
        $user = User::findorfail($id);
        $this->validate($request, [
            'new_password' => 'required|min:8|max:16|confirmed',
        ]);
        if(Hash::check($user['password'],$request->current_password)) { 
               $user->fill([
                'password' => Hash::make($request->new_password)
                ])->save();
                return back();

            } else {
                $request->session()->flash('error', 'Password does not match');
                return back();
            }
//        $user['password'] = bcrypt($request->new_password);
//        $user->save();
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }
}