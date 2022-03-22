<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$request->id,
            'password' => 'required|string|min:8|confirmed'
        ]);
    }

    public function index()
    {
        $users = User::get();
    	return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::get();
    	return view('users.create', ['roles' => $roles]);
    }
    
    public function createSubmit(Request $request)
    {
        $this->validator($request)->validate();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender
        ]);

        $user = User::find($user->id);
        $user->assignRole($request->role);
        
        return redirect('/user');
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $roles = Role::get();

    	return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }
    
    public function editSubmit(Request $request)
    {
        $this->validator($request)->validate();
        User::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender
            ]);

        $user = User::find($request->id);
        $user->syncRoles($request->role);
        
        return redirect('/user');
    }

    public function delete(Request $request, $id)
    {
        User::destroy($id);
        return redirect('/user');
    }
}
