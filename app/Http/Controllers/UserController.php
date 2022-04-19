<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('roleverif');
    }

    // Route vers l'index
    public function index(){
        $users = User::all();
        return view('user', compact('users'));
    }

    // Route vers edit
    public function edit($id){
        $edit = User::find($id);
        $roles = Role::all();
        $this->authorize('user-admin', $edit);
        return view('pages.user.edituser', compact('edit', 'roles'));
    }

    // Méthode update
    public function update($id, Request $request){
        $update = User::find($id);
        $update -> name = $request -> name;
        $update -> email = $request -> email;
        $update -> password = $request -> password;
        $update -> role_id = $request-> role_id;
        $update -> save();
        return redirect('/user');
    }

    // Méthode Show
    public function show($id){

    }

    // Méthode Delete
    public function destroy($id){
        $delete = User::find($id);
        $this->authorize('user-admin', $delete);
        $delete->delete();
        return redirect('/user');
    }
}
