<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class FavoritesController extends Controller
{
    
    function favorite($noteId)
    {
        $user = Auth::user();

        $user->favoritedNotes()->attach($noteId);
    }

    function unfavorite($noteId)
    {
        $user = Auth::user();

        $user->favoritedNotes()->detach($noteId);
    }

    function isFavorite($noteId)
    {

        $user = Auth::user();

        $note = $user->favoritedNotes()->find($noteId);
        return [ 'isFavorited' => $note != null ];

    }

    function favorites($noteId)
    {
        $note = Note::find($noteId);

        return $note->favoritedUsers()->paginate(30);
    }
}