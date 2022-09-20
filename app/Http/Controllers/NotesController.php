<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NotesController extends Controller
{
    //
    
    public function index() {
        $context = ['notes' => Note::all()];
        return view('index', $context);
    }

    public function detail(Note $note) {
        return view('detail', ['note' => $note]);
    }
}
