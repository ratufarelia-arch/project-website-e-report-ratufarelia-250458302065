<?php

namespace App\Http\Controllers\admin;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class datausercontroller extends Controller
{
    public function index(){
        $user =User::all();
        return view('admin.data-user.indexdatauser',compact('user'));
    }
    public function formdatauser(){
        return view('admin.data-user.createdatauser');
    }
    public function createDataUser(Request $request){
        $request->validate([
            'name' => 'required|string|max:225',
            'username' => 'required|string|max:225|unique:users',
            'email' => 'required|string|email|max:225|unique:users',
            'password' => 'required|string|min:8',
            'jenis_kelamin' => 'required|in:p,l',
            'telp' => 'nullable|string|max:13',
        ]);

        user::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'username'=> $request->username,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'telp'=> $request->telp,
            'role'=> 2,
            'password'=> Hash::make($request->password),
        ]);

    return redirect()->route('index.data-user');
    }

    public function editdatauser (Request $request){
        $user = User::findOrFail($request->id);
        return view('admin.data-user.editdatauser',compact('user'));
   
  }
    public function updatedatauser(Request $request){
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email =$request->email;
        $user->telp =$request->telp;
        $user->jenis_kelamin =$request->jenis_kelamin;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->update();
        return redirect()->route('index.data-user');

    }

    public function deletedatauser(Request $request){
        $user = User::findOrFail($request->id);
        $user->delete();
        
        return redirect()->back();

    }

    
    }
    
    

    

