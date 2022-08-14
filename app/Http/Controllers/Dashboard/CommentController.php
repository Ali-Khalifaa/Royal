<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeComment;
use App\Models\ContactComment;

class CommentController extends Controller
{

    public function homeComment(){
        $homeComments = HomeComment::all();
        return view('dashboard.Comments.index',compact('homeComments'));
    }

    public function contactComment(){
        $contactComments = ContactComment::all();
        return view('dashboard.Comments.contact',compact('contactComments'));
    }
    
}
