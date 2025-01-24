<?php
// app/Policies/BoardPolicy.php
namespace App\Policies;

use App\Models\User;
use App\Models\Board;

class BoardPolicy
{
    public function view(User $user, Board $board)
    {
        return $user->id === $board->user_id && $board->is_active;
    }

    public function update(User $user, Board $board)
    {
        return $user->id === $board->user_id;
    }

    public function delete(User $user, Board $board)
    {
        return $user->id === $board->user_id;
    }
}