<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;


class UserController extends Controller
{
    public function register()
    {
        return view('components.auth.register');
    }

    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);

        // Store User
        User::create([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        // Sign the user in
        auth()->attempt($request->only('email', 'password'));

        // Redirect
        return redirect('/');
    }

    // Login Form
    public function loginForm()
    {
        return view('components.auth.login');
    }

    // Login The User
    public function loginUser(Request $request)
    {
        // Validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Sign the user in
        if(!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid login details');
        }

        return redirect()->route('home');
    }

    // Logout User
    public function logout()
    {
        auth()->logout();

        return redirect()->back();
    }

    // ********************
    // Admin User Functions
    // ********************
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.user.index-user', ['users' => $users]);
    }

    // Shows the user details
    public function show(User $user)
    {
        $roles = Role::all();

        return view('admin.user.show-user', ['user' => $user, 'roles' => $roles]);
    }

    // Undating User info
    public function update(User $user)
    {
        // Data validation
        request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        // Assign the data
        $data = [
            'name' => request('name'),
            'nickname' => request('nickname'),
            'email' => request('email'),
        ];
        
        $user->update($data);

        Toastr::success('User updated successfuly!', 'System message');

        return redirect(route('user.index'));
    }

    // Attaching a role to the user
    public function attach(User $user)
    {
        $user->roles()->attach(request('role'));

        Toastr::success('Role attached successfuly!', 'System message');

        return redirect(route('user.show', $user->id));
    }

    // Detaching a role from the user
    public function detach(User $user)
    {
        $user->roles()->detach(request('role'));

        Toastr::success('Role detached successfuly!', 'System message');

        return redirect(route('user.show', $user->id));
    }

    // Deleting a User
    public function destroy(User $user) {
        $random_email = STR::random(30);

        $user->first_name = 'Deleted';
        $user->last_name = 'User';
        $user->email = $random_email . '@deleted.com';
        $user->save();

        Toastr::success('User Removed successfuly!', 'System message');

        return redirect(route('user.index'));
    }
}
