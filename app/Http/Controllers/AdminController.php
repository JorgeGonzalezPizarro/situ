<?php

namespace App\Http\Controllers;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{


    public function show(){

        $users=Auth::user()->getAuthPassword();
        return view('Admin')->with($users);

    }



    public function loginSentinel(Request $request){


        $user = Sentinel::getUser();
        return view('Admin')->withUser($user);;


    }



    public function getFullName(){
        $user= Auth::user();
        return view('alumnoDashboard')->withUser($user);


    }





    /**
     * Show the form for creating a new user.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('user.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @return Response
     */
    public function store()
    {
        $user = new User;

        $user->first_name = Input::get('first_name');
        $user->last_name  = Input::get('last_name');
        $user->username   = Input::get('username');
        $user->email      = Input::get('email');
        $user->password   = Hash::make(Input::get('password'));

        $user->save();

        return Redirect::to('/user');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return View::make('user.edit', [ 'user' => $user ]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $user = User::find($id);

        $user->first_name = Input::get('first_name');
        $user->last_name  = Input::get('last_name');
        $user->username   = Input::get('username');
        $user->email      = Input::get('email');
        $user->password   = Hash::make(Input::get('password'));

        $user->save();

        return Redirect::to('/user');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return Redirect::to('/user');
    }



}
