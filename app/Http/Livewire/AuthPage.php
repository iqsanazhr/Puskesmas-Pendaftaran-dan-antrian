<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class AuthPage extends Component
{
    // Login Properties
    public $loginEmail;
    public $loginPassword;

    // Register Properties
    public $registerName;
    public $registerEmail;
    public $registerPassword;
    public $registerPasswordConfirmation;
    public $registerNik;
    public $registerDob;
    public $registerGender;

    // State
    public $isRegister = false;

    public function mount()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role === 'admin' || $role === 'doctor') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'leader') {
                return redirect()->route('leader.dashboard');
            } else {
                return redirect()->route('patient.dashboard');
            }
        }

        // Determine initial state based on route name
        if (Route::currentRouteName() === 'register') {
            $this->isRegister = true;
        }
    }

    public function toggleMode()
    {
        $this->isRegister = !$this->isRegister;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function login()
    {
        $this->validate([
            'loginEmail' => 'required|email',
            'loginPassword' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->loginEmail, 'password' => $this->loginPassword])) {
            $role = Auth::user()->role;
            if ($role === 'admin' || $role === 'doctor') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'leader') {
                return redirect()->route('leader.dashboard');
            } else {
                return redirect()->route('patient.dashboard');
            }
        }

        $this->addError('loginEmail', 'Email atau password salah.');
    }

    public function register()
    {
        $this->validate([
            'registerName' => 'required|string|max:255',
            'registerEmail' => 'required|string|email|max:255|unique:users,email',
            'registerPassword' => 'required|string|min:8|same:registerPasswordConfirmation',
            'registerNik' => 'required|numeric|digits:16|unique:users,nik',
            'registerDob' => 'required|date',
            'registerGender' => 'required|in:L,P',
        ]);

        $user = User::create([
            'name' => $this->registerName,
            'email' => $this->registerEmail,
            'password' => Hash::make($this->registerPassword),
            'role' => 'patient',
            'nik' => $this->registerNik,
        ]);

        // Create Patient Profile immediately
        \App\Models\Patient::create([
            'user_id' => $user->id,
            'nik' => $this->registerNik,
            'name' => $this->registerName,
            'dob' => $this->registerDob,
            'gender' => $this->registerGender,
            // Phone and Address will be filled later in dashboard/profile editing
            'phone' => '-',
            'address' => '-',
        ]);

        Auth::login($user);

        return redirect()->route('patient.dashboard');
    }

    public function render()
    {
        /** @var \Illuminate\View\View $view */
        $view = view('livewire.auth-page');

        return $view->extends('layouts.app')
            ->section('content');
    }
}
