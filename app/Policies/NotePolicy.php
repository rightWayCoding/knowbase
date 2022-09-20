<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Note;

class NotePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Note $note) {
        return $note->user->id === $user->id;
    }

    public function destroy(User $user, Note $note) {
        return $this->update($user, $note);
    }
}
