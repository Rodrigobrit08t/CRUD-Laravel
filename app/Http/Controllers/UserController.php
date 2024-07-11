<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loadAllUsers(){
        $all_users = User::all();
        return view('users', compact('all_users'));
    }

    public function loadAddUserForm(){
        return view('add-user');
    }

    public function AddUser(Request $request){
        $request->validate([
            'name' => 'required|string', 
            'email' => 'required|email|unique:users',
            'phone' => 'required', 
            'password' => 'required|confirmed|min:4|max:8', 
        ]);
        try {
            $new_user = new User;
            $new_user->name = $request->name;
            $new_user->email = $request->email;
            $new_user->phone = $request->phone;
            $new_user->password = Hash::make($request->password);
            $new_user->save();
        

            return redirect('/users')->with('success', 'Professor Adicionado com Sucesso!');
        } catch (\Exception $e) {
            return redirect('/add/user')->with('fail',$e->getMessage());
        }
    }

    public function deleteUser($id){
        try {
            User::where('id', $id)->delete();
            return redirect('/users')->with('success', 'Professor Deletado!');
        } catch (\Exception $e) {
            return redirect('/users')->with('fail', $e->getMessage());
        }
    }

    public function EditUser(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        try {
            $update_user = User::where('id',$request->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            return redirect('/users')->with('success','Professor Atualizado!');
        } catch (\Exception $e) {
            return redirect('/edit/user')->with('fail',$e->getMessage());
        }
    }

    public function loadEditForm($id){
        $user = User::find($id);

        return view('edit-user', compact('user'));
    }

}
