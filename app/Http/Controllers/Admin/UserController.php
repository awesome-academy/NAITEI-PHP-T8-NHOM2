<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
        public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

        public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

        public function edit(User $user)
    { 
        return view('admin.users.edit', compact('user'));
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        User::create([
            'role' => 'user',
            'name' => $validated['name'],
            'username' => $validated['username'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.users.index')
                         ->with('success', 'User created successfully.');
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        $user->name = $validated['name'];
        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.users.index')
                         ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        // Authorization: Only allow if current user is not deleting themselves and is not deleting another admin (if not super admin)
        $currentUser = Auth::user();
        if ($currentUser->id === $user->id) {
            return redirect()->route('admin.users.index')->with('error', 'You cannot delete your own account.');
        };
        
        // Prevent deleting other admins unless current user is a super admin (assuming 'super_admin' role)
        if ($user->role === 'admin' && $currentUser->role !== 'super_admin') {
            return redirect()->route('admin.users.index')->with('error', 'You are not authorized to delete other admin accounts.');
        };

        $user->delete();

        return redirect()->route('admin.users.index')
                         ->with('success', 'User deleted successfully.');
    }
}