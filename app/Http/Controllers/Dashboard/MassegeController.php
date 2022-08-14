<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactComment;
use App\Models\EventComment;
use App\Models\ProjectComment;
use App\Models\EducationalComment;
use App\Models\ResidnetialComment;
use App\Models\ResortComment;

class MassegeController extends Controller
{
    public function ContactMassege()
    {
        $contactComments=ContactComment::orderBy('created_at','desc')->get();
        return view('dashboard.masseges.contact',compact('contactComments'));
    }
    public function EventMassege()
    {
        $eventMasseges=EventComment::orderBy('created_at','desc')->get();
        return view('dashboard.masseges.event',compact('eventMasseges'));
    }
    public function ProjectMassege()
    {
        $projectComments=ProjectComment::orderBy('created_at','desc')->get();
       
        
        return view('dashboard.masseges.project',compact('projectComments'));
    }
    public function ResidnetialMassege()
    {
        $residnetialComments=ResidnetialComment::orderBy('created_at','desc')->get();
       
        
        return view('dashboard.masseges.residentials',compact('residnetialComments'));
    }
    public function EducationalMassege()
    {
        $educationalComments=EducationalComment::orderBy('created_at','desc')->get();
       
        
        return view('dashboard.masseges.education',compact('educationalComments'));
    }
    public function ResortMassege()
    {
        $resortComments=ResortComment::orderBy('created_at','desc')->get();
       
        
        return view('dashboard.masseges.resort',compact('resortComments'));
    }

}
