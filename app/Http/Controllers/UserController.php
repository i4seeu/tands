<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Applicant;
use App\ParticipantCategory;
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

      $roles = Role::pluck('name', 'id');
      $categories = ParticipantCategory::pluck('name', 'id');
      return view('users.create',compact('roles','categories'));
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
         'password' => bcrypt($request['password']),
         'role_id' => $request['role_id'],
       ]);
      $applicant = Applicant::create([
      'first_name' => $request['first_name'],
      'last_name' => $request['last_name'],
      'institution' => $request['institution'],
      'speciality' => $request['speciality'],
      'address' => $request['address'],
      'position' => $request['position'],
      'title' => $request['title'],
      'gender' => $request['gender'],
      'user_id' => $user->id,
      'phone_number' => $request['phone_number'],
    ]);
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
      $roles = Role::pluck('name', 'id');
      $categories = ParticipantCategory::pluck('name', 'id');
      $user = User::findOrFail($id);
      return view('users.edit', compact('user','roles','categories')) ;
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
        'password' => bcrypt($request['password']),
        'role_id' => $request['role_id'],
      ]);
      Applicant::where('user_id',$id)->update([
      'first_name' => $request['first_name'],
      'last_name' => $request['last_name'],
      'institution' => $request['institution'],
      'speciality' => $request['speciality'],
      'address' => $request['address'],
      'position' => $request['position'],
      'title' => $request['title'],
      'gender' => $request['gender'],
      'phone_number' => $request['phone_number'],
      ]);
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
