<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Http\Requests\UserRequest; // Custom request
use App\Http\Requests\UserPassword; // Custom request
use App\Http\Requests\UserSocial; // Custom request
use App\User;

class UsersController extends Controller
{

    // public function __construct()
    // {
    //     $this->console_debug($data);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show all users
        $users = User::all();
        return view('admin.users-manager.all-users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Show add user form
        return view('admin.users-manager.add-user');
    }
    /**
     * Store the incoming blog post.
     *
     * @param  UserRequest  $request
     * @return Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\User
     */
    public function store(UserRequest $request)
    {
        $request->validated();

        $user = new User([
            'name' => $request->get('name'),
            'email'=> $request->get('email'),
            'role'=> $request->get('role'),
            'password' => Hash::make($request->get('password'))
          ]);
          $user->save();
          return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        // show the view and pass the user to it
        // return View::make('admin.user-profile')
        //     ->with('user', $user);

        return View::make('admin.users-manager.user-profile')
        ->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        // show the view and pass the user to it
        // return View::make('admin.user-profile')
        //     ->with('user', $user);
        return View::make('admin.users-manager.edit-user')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $request->validated();

        $user =  User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        // Haven't had avatar and background change
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        $user->bio = $request->get('bio');
        $user->userTags = $request->get('userTags');

        $user->save();

        return View::make('admin.users-manager.edit-user')
        ->with('user',$user)
        ->with('successMsg','You have successfully updated your infomation .');;
    }

    public function updateSocial(UserSocial $request, $id)
    {
        $request->validated();

        $user =  User::find($id);

        $user->facebook = $request->get('facebook');
        $user->twitter = $request->get('twitter');
        $user->github = $request->get('github');
        $user->instagram = $request->get('instagram');
        $user->snapchat = $request->get('snapchat');
        $user->googlePlus = $request->get('googlePlus');

        $user->save();// Not working

        return View::make('admin.users-manager.edit-user')
        ->with('user',$user)
        ->with('successMsg','You have successfully updated your infomation .');
    }

    public function updatePassword(UserPassword $request, $id)
    {
        $request->validated();

        $user =  User::find($id);
        $user->password = Hash::make($request->get('password'));

        $user->save();

        return View::make('admin.users-manager.edit-user')
        ->with('user',$user)
        ->with('successMsg','You have successfully updated your infomation .');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
   
        return redirect('/admin/users');
    }
}
