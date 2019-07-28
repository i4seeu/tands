<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Department;

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
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $request->user()->authorizeRoles(['System Administrator']);
      $users = User::all();
      return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $request->user()->authorizeRoles(['System Administrator']);
      $roles = Role::pluck('name', 'id');
      $departments = Department::pluck('name', 'id');
      return view('users.create',compact('roles','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|min:3|max:50',
        'email' => 'email',
        'password' => 'required|confirmed|min:6',
       ]);

       $user = User::create([
         'name'     => $request['name'],
         'email'    => $request['email'],
         'first_name'     => $request['first_name'],
         'last_name'    => $request['last_name'],
         'password' => bcrypt($request['password']),
         'department_id' => $request['department_id'],
       ]);
       $role = Role::where('id', $request['role_id'])->first();
       $user->roles()->attach($role);
       return redirect()->route('users');
 }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::findOrFail($id);
      return view('users.show', compact('user')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::findOrFail($id);
      $roles = Role::pluck('name', 'id');
      $departments = Department::pluck('name', 'id');
      return view('users.edit', compact('user','roles','departments')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      User::findOrFail($id)->update([
        'name'     => $request['name'],
        'email'    => $request['email'],
        'first_name'     => $request['first_name'],
        'last_name'    => $request['last_name'],
        'department_id' => $request['department_id'],
      ]);
      $user = User::findOrFail($id);
      $user->roles()->sync($request['role_id']);
      return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      User::findOrFail($id)->delete();
      return redirect()->route('users');
    }
}
