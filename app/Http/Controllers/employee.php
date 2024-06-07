<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class employee extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
