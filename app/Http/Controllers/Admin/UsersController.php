<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

use App\Http\Requests\UserRequests\UserRequest; // Custom request
use App\Http\Requests\UserRequests\UserEditRequest; // Custom request
use App\Http\Requests\UserRequests\UserPassword; // Custom request
use App\Http\Requests\UserRequests\UserSocial; // Custom request

use App\Models\User;

class UsersController extends Controller
{

    public function index()
    {
        // Show all users
        $users = User::all();
        return View::make('admin.users-manager.all-users')->with('users',$users);
    }
    
    public function filterUsers($property,$filter)
    {
        // Show all users but filtered
        $users = User::all();

        return View::make('admin.users-manager.all-users-filtered')
        ->with('users',$users)
        ->with('property',$property)
        ->with('filter',$filter);
    }

    public function create()
    {
        // Show add user form
        return View::make('admin.users-manager.add-user');
    }

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

    public function show($id)
    {
        $user = User::find($id);

        // show the view and pass the user to it

        return View::make('admin.users-manager.user-profile')
        ->with('user',$user);
    }

    public function edit($id)
    {
        $user = User::find($id);

        // show the view and pass the user to it
        return View::make('admin.users-manager.edit-user')->with('user',$user);
    }

    public function update(UserEditRequest $request, $id)
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

    public function activate($id)
    {

        $user =  User::find($id);
        $user->status = 'active';

        $user->save();
   
        return redirect('/admin/users');
    }

    public function deactivate($id)
    {

        $user =  User::find($id);
        $user->status = 'deactivated';

        $user->save();
   
        return redirect('/admin/users');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
   
        return redirect('/admin/users');
    }
}
