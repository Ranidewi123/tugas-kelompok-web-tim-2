<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Role::create(['name' => 'visitor']);
        // Permission::create([
        //     'name' => 'view product'
        // ]);
        // $role = Role::findById(3);
        // $permission =Permission::findById(7);

        // $role->givePermissionTo($permission);

        // auth()->user()->givePermissionTo('edit user');
        // auth()->user()->givePermissionTo('add user');
        // auth()->user()->givePermissionTo('add product');
        // auth()->user()->givePermissionTo('edit product');
        // auth()->user()->givePermissionTo('delete product');
        // auth()->user()->givePermissionTo('view product');
        // auth()->user()->assignRole('admin' );
        // return auth()->user()->permissions;

        return view('home');
    }
}
