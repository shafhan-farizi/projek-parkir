<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    public function show($id) {
        $user = User::find($id);

        return view('profile', [
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('admin.user.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $validated['password'] = Hash::make($request->password);

        User::create($validated);

        return redirect()->route('admin.user');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        if($request->password != null) {
            $password = $request->validate([
                'password' => 'confirmed',
                'password_confirmation' => 'required',
            ]);
            
            $validated['password'] = Hash::make($password['password']);
        }

        User::where('id', $id)->update($validated);

        return redirect()->route('admin.user');
    }

    // for user only
    public function changePassword(Request $request, $id) {
        $user = User::find($id);

        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(Hash::check($validated['current_password'], $user->password)) {
            unset($validated['password']);

            $user->update([
                'password' => Hash::make($validated['new_password'])
            ]);

            return redirect()->back();
        }
    }

    // for user only
    public function updateUser(Request $request, $id) {
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required|email'
        ]);
    
        User::where('id', $id)->update($validated);
    
        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('admin.user');
    }
}
