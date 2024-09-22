<?php
namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\RegisterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class RegisterMailController extends Controller
{
    public function register(Request $request)
    {
        // Validate the form inputs
        $validated = $request->validate([
            'email' => 'required|email|unique:register_users,email',
            'password' => 'required|min:6',
        ]);

        // Create a new RegisterUser record
        $user = RegisterUser::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Send the email with the form details
        Mail::to('Tobynic101@gmail.com')->queue(new RegisterMail($validated));

        // Return a JSON response
        return response()->json(['success' => 'User registered successfully!'], 201);
    }
}
