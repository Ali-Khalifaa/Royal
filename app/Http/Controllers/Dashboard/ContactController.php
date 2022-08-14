<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('dashboard.contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = Contact::all();
        return view('dashboard.contacts.create',compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contact $contact)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            $rules += [$locale . '.address' => ['required',Rule::unique('contact_translations','address')]];
            $rules += [$locale . '.title' => ['required',Rule::unique('contact_translations','title')]];
            $rules += [$locale . '.desc' => ['required',Rule::unique('contact_translations','desc')]];

        }
        $rules += [
            'phone_one' => 'required|max:100',
            'phone_two' => 'required|max:100',
        ];

        $request->validate($rules);
        $request_data=$request->all();
        $contact->create($request_data);

        return redirect()->route('dashboard.contact.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('dashboard.contacts.edit',compact('contact'));
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
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            $rules += [$locale . '.address' => ['required',Rule::unique('contact_translations','address')->ignore($contact->id,'contact_id')]];
            $rules += [$locale . '.title' => ['required',Rule::unique('contact_translations','title')->ignore($contact->id,'contact_id')]];
            $rules += [$locale . '.desc' => ['required',Rule::unique('contact_translations','desc')->ignore($contact->id,'contact_id')]];


        }
        $rules += [
            'phone_one' => 'required|max:100',
            'phone_two' => 'required|max:100',
        ];

        $request->validate($rules);
        $request_data=$request->all();
        $contact->update($request_data);

        return redirect()->route('dashboard.contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return \redirect()->route('dashboard.contact.index');
    }
}
