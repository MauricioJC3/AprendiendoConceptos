<?php
// app/Http/Controllers/BoardController.php
namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Board::where('user_id', Auth::id())
            ->where('is_active', true)
            ->get();
        return view('boards.index', compact('boards'));
    }

    public function create()
    {
        return view('boards.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        $board = Board::create([
            'name' => $validated['name'],
            'user_id' => Auth::id(),
            'is_active' => true
        ]);

        return redirect()->route('boards.show', $board);
    }

    public function show(Board $board)
    {
        // Check if the board belongs to the current user and is active
        if ($board->user_id !== Auth::id() || !$board->is_active) {
            abort(403, 'Unauthorized access');
        }

        $cards = $board->cards;
        return view('boards.show', compact('board', 'cards'));
    }

    public function update(Request $request, Board $board)
    {
        // Check if the board belongs to the current user
        if ($board->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action');
        }
        
        $validated = $request->validate([
            'name' => 'required|max:255',
            'is_active' => 'boolean'
        ]);

        $board->update($validated);
        return redirect()->route('boards.index');
    }

    public function destroy(Board $board)
    {
        // Check if the board belongs to the current user
        if ($board->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action');
        }

        $board->delete();
        return redirect()->route('boards.index');
    }
}