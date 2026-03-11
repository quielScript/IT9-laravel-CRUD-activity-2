<?php

namespace App\Http\Controllers;

use App\Models\BookLog;
use Illuminate\Http\Request;

class BookLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $logs = BookLog::all();
        return view('logs.index', compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('logs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_title' => 'required|string',
            'borrower_name' => 'required|string',
            'return_status' => 'required|in:borrowed,returned',
        ]);

        BookLog::create($validated);

        return redirect()->route('logs.index')->with('success', 'Log added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookLog $log)
    {
        return view('logs.edit', compact('log'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookLog $log)
    {
        $validated = $request->validate([
            'book_title' => 'required|string',
            'borrower_name' => 'required|string',
            'return_status' => 'required|in:borrowed,returned',
        ]);

        $log->update($validated);
        
        return redirect()->route('logs.index')->with('success', 'Log updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookLog $log)
    {
        $log->delete();

        return redirect()->route('logs.index')->with('success', 'Log deleted');
    }
}
