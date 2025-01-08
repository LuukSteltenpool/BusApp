<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use Illuminate\Support\Facades\Auth;
use App\Models\TicketOrder;
class TicketController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'quantity' => 'required|integer|min:1',
        ]);


        $bus = Bus::findOrFail($validated['bus_id']);

        TicketOrder::create([
            'user_id' => Auth::id(),
            'bus_id' => $validated['bus_id'],
            'quantity' => $validated['quantity'],
        ]);

        $pointsEarned = $validated['quantity'] * 10;
        $user = Auth::user();
        $user->points += $pointsEarned;
        $user->save();
        return redirect()->route('dashboard', $bus->id)
            ->with('success', 'Your tickets have been successfully ordered!');
    }
}



