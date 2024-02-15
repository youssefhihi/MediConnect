<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string|max:255',
            'patientID' => 'required|int',
            'doctorID' => 'required|int',
           
        ]);
    
       
        $comment = new Comment();
        $comment->comment = $validatedData['comment'];
        $comment->doctor_id = $validatedData['doctorID']; 
        $comment->patient_id = $validatedData['patientID']; 
        $comment->save();
        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comment $comment)
    {
        //
    }
}
