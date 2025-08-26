<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserAddressController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = auth()->user()->addresses()->with('province')->get();
        return view('user.addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::all();
        return view('user.addresses.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'province_id' => 'required|exists:provinces,id',
            'address' => 'required|string|max:255',
            'recipient_name' => 'required|string|max:255',
            'recipient_phone' => 'required|string|max:20',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        UserAddress::create($data);

        return redirect()->route('user.addresses.index')
            ->with('success', 'Address created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserAddress $address)
    {
        $this->authorize('update', $address);
        $provinces = Province::all();
        return view('user.addresses.edit', compact('address', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserAddress $address)
    {
        $this->authorize('update', $address);

        $request->validate([
            'province_id' => 'required|exists:provinces,id',
            'address' => 'required|string|max:255',
            'recipient_name' => 'required|string|max:255',
            'recipient_phone' => 'required|string|max:20',
        ]);

        $data = $request->all();

        if ($request->has('is_default')) {
            auth()->user()->addresses()->update(['is_default' => false]);
            $data['is_default'] = true;
        } else {
            $data['is_default'] = false;
        }

        $address->update($data);

        return redirect()->route('user.addresses.index')
            ->with('success', 'Address updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAddress $address)
    {
        $this->authorize('delete', $address);
        $address->delete();

        return redirect()->route('user.addresses.index')
            ->with('success', 'Address deleted successfully.');
    }
}
