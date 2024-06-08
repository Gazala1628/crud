<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class employee extends Controller
{
   
    /**
     * Display the specified resource.
     */
    public function listUsers()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editUser($id)
    {
        $user = user::findOrFail($id);
        return view('edit_user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $user = user::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'city' => $request->city,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect('api/users')->with('success', 'User updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('api/users')->with('success', 'User deleted successfully.');
    }
    public function showLoginForm()
    {
        return view('login');
    }

     
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');
    $remember = $request->has('remember');

    if (Auth::attempt($credentials, $remember)) {
        return redirect()->route('profile', ['id' => Auth::id()])->with('success', 'Login successful.');
    } else {
        return redirect()->back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
    }
}

    public function logout()
    {
        Auth::logout();
        return redirect('api/login')->with('success', 'Logout successful.');
    }
    public function profile($id)
{  
    $users = User::findOrFail($id);
        // Pass the authenticated user and the list of users to the profile view
        return view('profile', compact('users'));
    }  
}
