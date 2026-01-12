<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'guest_name' => 'required|string|max:255',
                'guest_email' => 'required|email|max:255',
                'subjet' => 'required|string|max:255',
                'content' => 'required|string',
            ]);

            Message::create($request->all());

            return redirect()->back()->with('success', 'Message envoyé avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Envoie de message échoué: ' . $e->getMessage());
        }
    }

}
