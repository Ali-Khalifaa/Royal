<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = Word::all();
        return view('dashboard.words.index',compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $words = Word::all();
        return view('dashboard.words.create',compact('words'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Word $word)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            $rules += [$locale . '.desc' => ['required',Rule::unique('word_translations','desc')]];

        }

        $request->validate($rules);
        $request_data=$request->all();
        $word->create($request_data);

        return redirect()->route('dashboard.word.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $word)
    {
        return view('dashboard.words.edit',compact('word'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word)
    {
        $rules=[];

        foreach(config('translatable.locales') as $locale){

            $rules += [$locale . '.desc' => ['required',Rule::unique('word_translations','desc')->ignore($word->id,'word_id')]];

        }

        $request->validate($rules);
        $request_data=$request->all();
        $word->update($request_data);

        return redirect()->route('dashboard.word.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word)
    {
        $word->delete();
        return \redirect()->route('dashboard.word.index');
    }
}
