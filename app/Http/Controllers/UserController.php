<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function uploadAvatar(Request $request) {

        if($request->hasFile('image')) {
            User::uploadAvatar($request->image);
            return redirect()->back()->with('message', 'Image Uploaded.');
        }
        return redirect()->back()->with('error', 'Image Not Uploaded.');
    }

    

    public function index() {

        $data = [
            'name' => 'Elon',
            'email' => 'elon@bitfumes.com',
            'password' => 'password',
        ];

        // User::create($data);

        // $user = new User();
        // $user->name = 'sarthak';
        // $user->email = 'sarthak@bitfumes.com';
        // $user->password = bcrypt('password');
        // $user->save();

        $user = User::all();
        return $user;

        // User::where('id', 2)->delete();
        
        // User::where('id', 3)->update(['name' => 'bitfummeeees']);

        

        //DB::insert('insert into users(name, email, password) values(?, ?, ?)', [
        //    'sarthak', 'sarthak@bitfumes.com', 'password',
        //]);

        // DB::update('update users set name = ? where id = 1', ['bitfumes']);
        
        // DB::delete('delete from users where id = 1');

        // $users = DB::select('select * from users');
        

        return view('home');
    }
}
