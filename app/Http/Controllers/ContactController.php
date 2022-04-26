<?php

namespace App\Http\Controllers;

use App\Mail\IntroMail;
use App\Models\Contact;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Mockery\Matcher\Subset;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('pages.email.intromail', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Contact();
        $store -> email = $request -> email;
        $store -> text = $request -> text;
        $store -> subject_id = $request -> subject_id;
        $store -> user_id = Auth::user()->id;
        $store -> save();
        
        Mail::send('pages.email.envoi', array(
            "email" => $request -> email,
            "text" => $request -> text
        ), function($message) use ($request) {
            $message -> from ($request -> email);
            $subject = Subject::all();
            $message -> to("hello@example.com", 'Johan')->subject($subject[($request->subject_id) - 1]->subject);
        });
        return redirect()->back()->with('success', 'Votre mail a été envoyer, nous reviendrons vers vous le plus vite possible');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
