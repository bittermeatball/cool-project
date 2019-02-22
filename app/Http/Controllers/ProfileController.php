<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UserRequest; // Custom request
use App\Http\Requests\UserEditRequest; // Custom request
use App\Http\Requests\UserPassword; // Custom request
use App\Http\Requests\UserSocial; // Custom request
use App\User;

class ProfileController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);
        if ( $user->id == Auth::user()->id ) {
            // show the view and pass the user to it
            return View::make('admin.users-manager.edit-user')->with('user',$user);            
        } else {
            return redirect('/403');
        }        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $request->validated();

        $user =  User::find($id);

        if ( $user->id == Auth::user()->id ) {
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            // Haven't had avatar and background change
            $user->address = $request->get('address');
            $user->phone = $request->get('phone');
            $user->bio = $request->get('bio');
            $user->userTags = $request->get('userTags');

            $user->save();

            return View::make('admin.users-manager.edit-user')
            ->with('user',$user)
            ->with('successMsg','You have successfully updated your infomation .');;          
        } else {
            return redirect('/403');
        }
    }

    public function updateSocial(UserSocial $request, $id)
    {
        $request->validated();

        $user =  User::find($id);

        if( $user->id == Auth::user()->id){
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
        } else {
            return redirect('/403');
        }
    }

    public function updatePassword(UserPassword $request, $id)
    {
        $request->validated();

        $user =  User::find($id);

        if( $user->id == Auth::user()->id){
            $user->password = Hash::make($request->get('password'));

            $user->save();

            return View::make('admin.users-manager.edit-user')
            ->with('user',$user)
            ->with('successMsg','You have successfully updated your infomation .');           
        } else {
            return redirect('/403');
        }
    }
}
