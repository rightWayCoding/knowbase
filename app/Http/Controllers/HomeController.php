<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Note;

class HomeController extends Controller
{
    private const NOTE_VALIDATOR = [
        'title' => 'required|max:50',
        'content' => 'required',
    ];

    private const NOTE_ERROR_MESSAGES = [
        'required' => 'Заполните это поле',
        'max' => 'Значение не должно быть длиннее :max символов',
        'numeric' => 'Введите число'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',
                    ['notes' => Auth::user()->notes()->latest()->get()]);
    }
    
    public function showAddNoteForm() {
        return view('note_add');
    }

    public function storeNote(Request $request) {
        $validated = $request->validate(self::NOTE_VALIDATOR,
                                        self::NOTE_ERROR_MESSAGES);
        Auth::user()->notes()->create([
            'title'=>$validated['title'],
            'content'=>$validated['content']
        ]);
        return redirect()->route('home');
    }

    public function showEditNoteForm(Note $note) {
        return view('note_edit', ['note'=> $note]);
    }

    public function updateNote(Request $request, Note $note) {
        $validated = $request->validate(self::NOTE_VALIDATOR,
        self::NOTE_ERROR_MESSAGES);
        $note->fill([
            'title'=>$validated['title'],
            'content'=>$validated['content']
        ]);
        $note->save();
        return redirect()->route('home');
    }

    public function showDeleteNoteForm(Note $note) {
        return view('note_delete', ['note'=> $note]);
    }

    public function destroyNote(Note $note) {
        $note->delete();
        return redirect()->route('home');
    }
}
