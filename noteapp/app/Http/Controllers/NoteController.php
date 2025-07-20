<?php
namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;
use Inertia\Inertia;
class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return Inertia::render('Notes/Index', ['notes' => $notes]);
    }
    public function create()
    {
        return Inertia::render('Notes/Create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        Note::create($request->all());
        return redirect()->route('notes.index');
    }
    public function edit(Note $note)
    {
        return Inertia::render('Notes/Edit', ['note' => $note]);
    }
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $note->update($request->all());
        return redirect()->route('notes.index');
    }
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index');
    }
}