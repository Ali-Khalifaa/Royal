<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ChoseSlider;
use App\Models\EmailSetting;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Nationality;
use App\Models\Specialization;
use App\Models\Admission;
use App\Models\HomeComment;
use App\Models\ContactComment;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Aboutsetting;
use App\Models\Chose;
use App\Models\Video;
use App\Models\Homespecialist;
use App\Models\Counter;
use App\Models\Clientsay;
use App\Models\Aboutsectionone;
use App\Models\Aboutthree;
use App\Models\Partenar;
use App\Models\Servicesone;
use App\Models\Sevicestwo;
use App\Models\Sevicesthree;
use App\Models\Doctor;
use App\Models\Gallery;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Certificat;
use App\Models\Country;
use App\Models\SpecializationChild;

// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Mail;
use DateTime;
use Session;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Validator;


class indexController extends Controller
{

    public function index()
    {
        $settings = Setting::all();
        $sliders = Slider::all();
        $services = Service::all();
        $aboutsettings = Aboutsetting::all();
        $choses = Chose::all();
        $videos = Video::all();
        $homespecialists = Homespecialist::all();
        $counters = Counter::all();
        $clientsays = Clientsay::all();
        $chooseSliders = ChoseSlider::all();


        return view('frontend.index', compact('settings', 'sliders', 'services', 'aboutsettings', 'choses', 'videos', 'homespecialists', 'counters', 'clientsays', 'chooseSliders'));
    }

    public function indexComment(Request $request, HomeComment $homeComment)
    {
        $request_data = $request->all();
        $homeComment->create($request_data);

        return redirect()->route('index');
    }


    //  //  //  //  //  //  //  //  //

    public function addmission()
    {
        $id = Auth::user()->id;
        $admissions = Admission::where('user_id', '=', $id)->first();

        if ($admissions == null) {
            $settings = Setting::all();
            $nationalities = Nationality::all();
            $specializations = Specialization::all();
            $countries = Country::all();
            $SpecializationChilds = SpecializationChild::all();


            return view('frontend.addmission', compact('nationalities', 'specializations', 'settings', 'countries', 'SpecializationChilds'));
        }

        $settings = Setting::all();

        return view('frontend.profile', compact('settings', 'admissions'));
    }

    public function login()
    {
        $settings = Setting::all();
        return view('frontend.login', compact('settings'));
    }

    public function addmissioncreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //            'first_name' => 'required|string|max:100',
            //            'second_name' => 'required|string|max:100',
            //            'last_name' => 'required|string|max:100',
            //            'description' => 'required|string',
            //            'phone' => 'required|string|max:100',
            //            'experience' => 'required',
            //            'cv_file' => 'required|mimes:pdf|max:10000',
            //            'img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }

        // move
        $cv = $request->file('filepdf');
        $ext_cv = $cv->getClientOriginalExtension();
        $cv_name = "addmission-" . uniqid() . ".$ext_cv";
        $cv->move(public_path('uploads/addmission/pdf/'), $cv_name);


        ///file
        $img = $request->file('img');
        $ext_img = $img->getClientOriginalExtension();
        $img_name = "addmission-" . uniqid() . ".$ext_img";
        $img->move(public_path('uploads/addmission/img/'), $img_name);
        //create user for instructor
        $userId = Auth::user()->id;


        $Ps_instructor = Admission::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'graduation' => $request->graduation,
            'email' => $request->email,
            'national_id' => $request->national_id,
            'c_v' => $cv_name,
            'img' => $img_name,
            'university' => $request->university,
            'work' => $request->work,
            'employment' => $request->employment,
            'experience' => $request->experience,
            'nationality_id' => $request->nationality_id,
            'Country_id' => $request->Country_id,
            'specialization_id' => $request->specialization_id,
            'specialization_children_id' => $request->specialization_children_id,
            'user_id' => $userId,
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => 'welcome message',
            'body' => 'Dear Dr:<h4>' . $request->name . '</h4>
            </br>
            Thanks for showing your interest to join our programs ,
            </br>
            you have successfully completed your registration form to apply to our specialty programs,
            </br>
            we will shortly inform you with all the details to proceed with your application process.
             </br>
            We wish you the best of luck.',
        );
        Mail::send('frontend.mailregister', $data, function ($message) use ($data) {
            $message->from('Admission@rdi-int.co.uk', 'Royal Dent Institute ');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });
        $emailSetting = EmailSetting::first();
        $data = array(
            'email' => $request->email,
            'subject' => 'Registration fees payment',
            'body' => 'Dear Dr:<h4>' . $request->name . '</h4>
            </br>

<p>
In order to complete your registration process, you will have to pay the registration fees of ' . $emailSetting->price_egypt . ' EGP for Egyptians or ' . $emailSetting->price_non_egypt . ' USD for non-Egyptians.
</p>
            </br>
<h5>Payment methods:</h5>
<p>
1.	Pay in cash at RDI 6th of October, please call our clinical director Dr Amr Rafat on + 002' . $emailSetting->phone . ' to arrange for an appointment.
</p>
<p>
2.	Vodafone Cash to + 2' . $emailSetting->vodafone_cash . '.
</p>
<p>
3.	Western union (in case of choosing this method we will provide you with the full details of the recipient)
</p>
<p>
•	If paying by Vodafone cash or western union, please scan/screen shot the receipt and email to ' . $emailSetting->email . ' or WhatsApp to + 002' . $emailSetting->phone . '.
We will then email you with your first interview details.
</p>
<p>
Important: Please note that registration fees are refundable ONLY if the candidate is not accepted to join the program by RDI.
No refunds are possible if you don’t show up to the interviews.
</p>
<p>
If the candidate is successful in joining the program the registration fees will be deducted from the semester fees.
We wish you the best of luck
</p>

Dr. Amr Rafat
<p>
Clinical Director at RDI
</p>
002' . $emailSetting->phone . '

            ',
        );
        Mail::send('frontend.mailregister', $data, function ($message) use ($data) {
            $message->from('Admission@rdi-int.co.uk', 'Royal Dent Institute');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });

        return redirect()->route('index')->with('success', 'You Have Created An Admission Successfully.');
    }

    //  //  //  //  //  //  //  //  //

    public function about()
    {
        $settings = Setting::all();
        $aboutsectionones = Aboutsectionone::all();
        $counters = Counter::all();
        $aboutsectionthrees = Aboutthree::all();
        $services = Service::all();
        $clientsays = Clientsay::all();
        $partenars = Partenar::all();

        return view('frontend.about', compact('settings', 'aboutsectionones', 'counters', 'aboutsectionthrees', 'services', 'clientsays', 'partenars'));
    }

    //  //  //  //  //  //  //  //  //

    public function contact()
    {
        // $contacts=Contact::all();
        $settings = Setting::all();
        return view('frontend.contact', compact('settings'));
    }

    public function contactComment(Request $request, ContactComment $contactComments)
    {
        $request_data = $request->all();
        $contactComments->create($request_data);

        return redirect()->route('contact');
    }

    public function gallery()
    {
        $galleries = Gallery::all();
        $settings = Setting::all();
        return view('frontend.gallery', compact('settings', 'galleries'));
    }


    public function our_doctors()
    {
        $doctors = Doctor::all();
        $settings = Setting::all();
        return view('frontend.our_doctors', compact('settings', 'doctors'));
    }

    public function services()
    {
        $settings = Setting::all();
        $servicesones = Servicesone::all();
        $sevicestwos = Sevicestwo::all();
        $sevicesthrees = Sevicesthree::all();

        return view('frontend.services', compact('settings', 'servicesones', 'sevicestwos', 'sevicesthrees'));
    }

    public function profile()
    {

        $id = Auth::user()->id;
        $questions = Question::all();
        $admissions = Admission::where('user_id', '=', $id)->first();

        if ($admissions == null) {
            $settings = Setting::all();
            $nationalities = Nationality::all();
            $specializations = Specialization::all();
            $countries = Country::all();
            $SpecializationChilds = SpecializationChild::all();


            return view('frontend.addmission', compact('nationalities', 'specializations', 'settings', 'questions', 'countries', 'SpecializationChilds'));
        }

        $settings = Setting::all();

        return view('frontend.profile', compact('settings', 'admissions'));
    }


    //  //  //  //  //  //  //  //  //

    public function startExam(Request $request)
    {
        date_default_timezone_set('Africa/Cairo');

        $user = auth()->user();
        if (is_null($user->certificate)) {
            // get rondom 50 questions and save it to session
            $ids = Question::all()->random(50)->pluck('id');
            Session::put('ids', $ids);
            $certification = new Certificat([
                'user_id' => $user->id,
                'time' => now(),
                'end_time' => date('Y-m-d H:i:s', strtotime('+30 minutes', strtotime(now()))),
                'next' => 0
            ]);
            $certification->save();
            $certification = Certificat::findOrFail($certification->id);
            /*
            * return first Question
            */
            $next_id = Session::get('ids')[$certification->next];

            $question = Question::findOrFail($next_id);

            //update next
            $certification->update([
                'next' => $certification->next
            ]);

            // Html question
            $html_question['html'] = '
            <span>(' . $certification->next . '/' . $certification->number_of_questions . ')</span>

            <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" id="question">

                <label for="formGroupExampleInput">' . $question->question . '</label>';

            // Add Answers
            foreach ($question->answers as $answer) {
                $html_question['html'] .= '
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer" value="' . $answer->id . '" id="flexRadioDefault' . $answer->id . '">
                        <label class="form-check-label" for="flexRadioDefault' . $answer->id . '">
                            ' . $answer->answer . '
                        </label>
                    </div>
                    ';
            }
            $html_question['html'] .= '
                    <div class="row align-items-center">
                        <div class="col-12 text-left" id="next_question" onclick="nextQuestion()">
                            <button class="btn btn-sm btn-primary">Next</button>
                        </div>
                    </div>
            </div>
            ';
            $html_question['date'] = $certification->end_time;
            return $html_question;
        }

    }


    // go to next question
    public function nextQuestion()
    {
        if (!empty($_GET['answer'])) {
            $answer_id = $_GET['answer'];
            //get current question
            $user = auth()->user();
            $certification = $user->certificate;
            $next_id = Session::get('ids')[$certification->next];

            $question = Question::findOrFail($next_id);

            /*
             * Check first if the user have exam
             */
            if (!is_null($user->certificate)) {
                // check if the exam still in time
                if ($certification->time <= now() && $certification->end_time >= now()) {
                    /*
                    *  Check if the answer is in the question
                    */

                    if ($question->answers->contains($answer_id)) {
                        /*
                         * Check answer correct
                         */
                        $answer = Answer::findOrFail($answer_id);
                        if ($answer->is_correct) {
                            $certification->update([
                                'correct_questions' => $certification->correct_questions + 1,
                                'percentage' => ($certification->correct_questions + 1) / $certification->number_of_questions * 100,
                                'next' => $certification->next + 1,
                            ]);
                            /*
                            * Check if the user result successfull or not
                            */
                            if ($certification->percentage >= 50) {
                                $certification->update([
                                    'result' => 'successful',
                                ]);
                            }
                        } else {
                            $certification->update([
                                'next' => $certification->next + 1,
                            ]);
                        }
                        /*
                         *  check first if no more questions
                         */
                        if ($certification->next < 50) {
                            $next_id = Session::get('ids')[$certification->next];

                            $question = Question::findOrFail($next_id);

                            // Html question
                            $html_question = '
                         <span>(' . $certification->next . '/' . $certification->number_of_questions . ')</span>

                         <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" id="question">

                             <label for="formGroupExampleInput">' . $question->question . '</label>';

                            // Add Answers
                            foreach ($question->answers as $answer) {
                                $html_question .= '
                                 <div class="form-check">
                                     <input class="form-check-input" type="radio" name="answer" value="' . $answer->id . '" id="flexRadioDefault' . $answer->id . '">
                                     <label class="form-check-label" for="flexRadioDefault' . $answer->id . '">
                                         ' . $answer->answer . '
                                     </label>
                                 </div>
                                 ';
                            }
                            $html_question .= '
                                 <div class="row align-items-center">
                                     <div class="col-12 text-left" id="next_question" onclick="nextQuestion()">
                                         <button class="btn btn-sm btn-primary">Next</button>
                                     </div>
                                 </div>
                         </div>
                         ';
                            return $html_question;
                        } else {
                            return 1;
                        }
                    }
                }
            } else {
                return 'User Not Have Exam';
            }
        } else {
            return 0;
        }
    }
}
