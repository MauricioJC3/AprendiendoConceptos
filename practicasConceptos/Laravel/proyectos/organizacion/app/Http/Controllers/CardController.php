<?php
namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function store(Request $request, Board $board)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,in_progress,done',
            'priority' => 'required|in:low,medium,high',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date'
        ]);
    
        $card = $board->cards()->create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'] ?? null,
            'status' => $validatedData['status'],
            'priority' => $validatedData['priority'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'] ?? null
        ]);
    
        return redirect()->back()->with('success', 'Card created successfully');
    }

    public function update(Request $request, Card $card)
    {
        // Eager load the board to ensure it exists
        $card->load('board');
    
        // Check if board exists and belongs to current user
        if (!$card->board || $card->board->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action');
        }
    
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,in_progress,done',
            'priority' => 'required|in:low,medium,high',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date'
        ]);
    
        $card->update($validatedData);
    
        return redirect()->back()->with('success', 'Card updated successfully');
    }

    public function destroy(Card $card)
{
    // Ensure the card belongs to the current user's board
    if ($card->board->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action');
    }

    $card->delete();

    return redirect()->back()->with('success', 'Card deleted successfully');
}
}