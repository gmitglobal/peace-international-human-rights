<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ReferTable;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // 
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'phone'       => ['required', 'string', 'max:20', 'unique:users'],
            'email'       => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'password'    => ['required', 'confirmed', Rules\Password::defaults()],
            'referred_by' => ['nullable', 'exists:users,refer_id'],
        ]);

        DB::beginTransaction();

        try {
            // Generate new refer_id
            $lastReferId = User::max('refer_id');
            $newReferId  = $lastReferId ? $lastReferId + 1 : 1000;

            // Check if the referred_by user exists
            $refer = User::where('refer_id', $request->referred_by)->first();

            if ($refer) {
                // Increment referral count safely
                $refer->increment('count');
            }

            // Create user
            $user = User::create([
                'name'        => $request->name,
                'refer_id'    => $newReferId,
                'refered_by'  => $request->referred_by,
                'phone'       => $request->phone,
                'email'       => $request->email,
                'password'    => Hash::make($request->password),
            ]);

            event(new Registered($user));
            Auth::login($user);

            DB::commit();

            return redirect()->route('dashboard');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }

        #################################################################
        #################################################################
        #################################################################
        #################################################################
    }
}
