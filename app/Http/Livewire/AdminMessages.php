<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ContactMessage;

class AdminMessages extends Component
{
    public function mount()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect('/');
        }
    }

    public function render()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();

        return view('livewire.admin-messages', [
            'messages' => $messages
        ])
            ->extends('layouts.app')
            ->section('content');
    }
}
