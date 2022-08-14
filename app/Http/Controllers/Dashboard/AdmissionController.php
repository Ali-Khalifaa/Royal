<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\EmailSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Mail;
use App\Models\Certificat;

use Illuminate\Support\Facades\DB;

class AdmissionController extends Controller
{
    public function index()
    {
        $admissions = Admission::where([

            ['step_1', '=', 0],
            ['step_2', '=', 0],
            ['step_3', '=', 0],
            ['stutas', '=', 'success'],
            ['exam', '=', 0],

        ])->orderBy('created_at', 'desc')->get();

        return view('dashboard.admissions.index', compact('admissions'));
    }

    public function destroy($id)
    {
        $admission = Admission::find($id);
        $admission->users->delete();
        return back();
    }

    public function show($id)
    {
        $admission = Admission::find($id);

        return view('dashboard.admissions.show', compact('admission'));

    }

    public function subscription($id)
    {
        $admission = Admission::find($id);

        $emailSetting = EmailSetting::first();

        $data = array(
            'email' => $admission->email,
            'subject' => 'Registration fees payment',
            'body' => 'Dear Dr:<h4>' . $admission->name . '</h4>
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

        return redirect()->route('dashboard.addmission.index');

    }

    //////////////////////////step one

    public function interViewOne($id)
    {

        $admission = Admission::find($id);

        return view('dashboard.admissions.enterviewone', compact('admission'));

    }

    public function addmissionStepOne($id, Request $request)
    {
        $admission = Admission::find($id);
        $emailSetting = EmailSetting::first();

        $users = User::where('id', '=', $admission->user_id)->first();

        $users->update([
            'interview_one' => $request->interview_one,
            'plase_interview_one' => $request->plase_interview_one,
        ]);

        $admission->update([
            'step_1' => 1
        ]);
        $new3 = str_replace("T", "  ", $request->interview_one);

        $data = array(

            'email' => $admission->email,
            'subject' => 'first interview date',
            'body' => 'Dear Dr:<h4>' . $admission->name . '</h4>
            </br>

            We would like to inform you that your first interview will be conducted on
            ' . $new3 . '
            in ' . $request->plase_interview_one . '.
            <p>
            If you have any questions, please contact the number below, or reply to this email.
            </p>
            <p>
            Please note that the registration fees are non-refundable if you don’t show up to the interview.
            </p>
            We wish you the best of luck
            <p>
            Dr. Amr Rafat
            </p>
            Clinical Director at RDI
            <p>
            002' . $emailSetting->phone . '
            </p>

            ',
        );

        Mail::send('frontend.mailregister', $data, function ($message) use ($data) {

            $message->from('Admission@rdi-int.co.uk', 'Royal Dent Institute');
            $message->to($data['email']);
            $message->subject($data['subject']);

        });

        return redirect()->route('dashboard.addmission.index');
    }

    public function getaddmissionStepOne()
    {
        $admissions = Admission::where([

            ['step_1', '=', 1],
            ['step_2', '=', 0],
            ['step_3', '=', 0],
            ['stutas', '=', 'success'],
            ['exam', '=', 0],

        ])->get();

        return view('dashboard.admissions.stepOne', compact('admissions'));
    }

    /////////////////////////////////step two

    public function interViewTwo($id)
    {
        $admission = Admission::find($id);
        return view('dashboard.admissions.enterviewtwo', compact('admission'));
    }

    public function addmissionStepTwo($id, Request $request)
    {
        $admission = Admission::find($id);

        $users = User::where('id', '=', $admission->user_id)->first();

        $users->update([
            'interview_two' => $request->interview_two,
            'plase_interview_two' => $request->plase_interview_two,
        ]);

        $admission->update([
            'step_2' => 1
        ]);

        $new3 = str_replace("T", "  ", $request->interview_two);

        $emailSetting = EmailSetting::first();

        $data = array(
            'email' => $admission->email,
            'subject' => 'second interview date',
            'body' => 'Dear Dr:<h4>' . $admission->name . '</h4>
            </br>

            We would like to inform you that your second interview will be conducted on
            ' . $new3 . '
            in ' . $request->plase_interview_two . '.
            <p>
            If you have any questions, please contact the number below, or reply to this email : info@royaldentistscenter.com.
            </p>
            <p>
            Please note that the registration fees are non-refundable if you don’t show up to the interview.
            </p>
            We wish you the best of luck
            <p>
            Dr. Amr Rafat
            </p>
            Clinical Director at RDI
            <p>
            002' . $emailSetting->phone . '
            </p>

            ',

        );
        Mail::send('frontend.mailregister', $data, function ($message) use ($data) {
            $message->from('Admission@rdi-int.co.uk', 'Royal Dent Institute');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });

        return redirect()->route('dashboard.addmission.getaddmissionStepOne');
    }


    /// change enter view one date

    public function changeViewOne($id)
    {
        $admission = Admission::find($id);
        return view('dashboard.admissions.chandeEnterviewone', compact('admission'));
    }

    public function changeStepOne($id, Request $request)
    {
        $admission = Admission::find($id);

        $users = User::where('id', '=', $admission->user_id)->first();
        $old_date = $users->interview_one;
        $old_plase = $users->plase_interview_one;

        $users->update([
            'interview_one' => $request->interview_one,
            'old_interview_one' => $old_date,
            'plase_interview_one' => $request->plase_interview_one,
            'old_plase_interview_one' => $old_plase,
        ]);

        $admission->update([
            'step_1' => 1
        ]);

        $new1 = str_replace("T", "  ", $request->interview_one);
        $new2 = str_replace("T", "  ", $users->old_interview_one);
        $emailSetting = EmailSetting::first();

        $data = array(
            'email' => $admission->email,
            'subject' => ' Change first interview date',
            'body' => 'Dear Dr:<h4>' . $admission->name . '</h4>
            </br>


            Unfortunately, we need to reschedule your first interview to be on ' . $new1 . ' in ' . $request->plase_interview_one . ' instead of ' . $new2 . ' in ' . $users->old_plase_interview_one . '
            <p>
            If you have any questions, please contact the number below, or reply to this email : ' . $emailSetting->email . '.
            </p>
            We wish you the best of luck
            <p>
            Dr. Amr Rafat
            </p>
            Clinical Director at RDI
            <p>
            002' . $emailSetting->phone . '
            </p>

            ',

        );
        Mail::send('frontend.mailregister', $data, function ($message) use ($data) {
            $message->from('Admission@rdi-int.co.uk', 'Royal Dent Institute');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });

        return redirect()->route('dashboard.addmission.getaddmissionStepOne');
    }

    public function getaddmissionStepTwo()
    {

        $admissions = Admission::where([

            ['step_1', '=', 1],
            ['step_2', '=', 1],
            ['step_3', '=', 0],
            ['stutas', '=', 'success'],
            ['exam', '=', 0],

        ])->get();
        return view('dashboard.admissions.stepTwo', compact('admissions'));
    }

    ////////////////////////////////step three

    public function addmissionStepThree($id)
    {
        $admission = Admission::find($id);
        $emailSetting = EmailSetting::first();
        $admission->update([
            'step_3' => 1
        ]);

        $data = array(
            'email' => $admission->email,
            'subject' => ' Approval message',
            'body' => 'Dear Dr:<h4>' . $admission->name . '</h4>
            </br>

            Congratulations, you have been accepted to take the exam
            <p>
            If you have any questions, please contact the number below, or reply to this email : ' . $emailSetting->email . '.
            </p>
            We wish you the best of luck
            <p>
            Dr. Amr Rafat
            </p>
            Clinical Director at RDI
            <p>
            002' . $emailSetting->phone . '
            </p>

            ',

        );
        Mail::send('frontend.mailregister', $data, function ($message) use ($data) {
            $message->from('Admission@rdi-int.co.uk', 'Royal Dent Institute');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });


        return redirect()->route('dashboard.addmission.getaddmissionStepTwo');
    }

    public function getaddmissionStepThree()
    {
        $admissions = Admission::where([

            ['step_1', '=', 1],
            ['step_2', '=', 1],
            ['step_3', '=', 1],
            ['stutas', '=', 'success'],
            ['exam', '=', 0],

        ])->get();

        return view('dashboard.admissions.stepThree', compact('admissions'));
    }


    /// change enter view two date

    public function changeViewTwo($id)
    {
        $admission = Admission::find($id);
        return view('dashboard.admissions.changeenterviewtwo', compact('admission'));
    }

    public function changeStepTwo($id, Request $request)
    {
        $admission = Admission::find($id);

        $users = User::where('id', '=', $admission->user_id)->first();
        $old_date = $users->interview_two;
        $old_plase = $users->plase_interview_two;

        $users->update([
            'interview_two' => $request->interview_two,
            'old_interview_two' => $old_date,
            'plase_interview_two' => $request->plase_interview_two,
            'old_plase_interview_two' => $old_plase,
        ]);

        $admission->update([
            'step_1' => 1
        ]);

        $new1 = str_replace("T", "  ", $request->interview_two);
        $new2 = str_replace("T", "  ", $users->old_interview_two);

        $emailSetting = EmailSetting::first();
        $data = array(
            'email' => $admission->email,
            'subject' => ' Change second interview date',
            'body' => 'Dear Dr:<h4>' . $admission->name . '</h4>
            </br>


            Unfortunately, we need to reschedule your second interview to be on ' . $new1 . ' in ' . $request->plase_interview_two . ' instead of ' . $new2 . ' in ' . $users->old_plase_interview_two . '
            <p>
            If you have any questions, please contact the number below, or reply to this email : ' . $emailSetting->email . '.
            </p>
            We wish you the best of luck
            <p>
            Dr. Amr Rafat
            </p>
            Clinical Director at RDI
            <p>
            002' . $emailSetting->phone . '
            </p>

            ',

        );
        Mail::send('frontend.mailregister', $data, function ($message) use ($data) {
            $message->from('Admission@rdi-int.co.uk', 'Royal Dent Institute');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });


        return redirect()->route('dashboard.addmission.getaddmissionStepTwo');
    }


    ///////////////////////// exam
    public function toExam($id)
    {
        $admission = Admission::find($id);

        return view('dashboard.admissions.toexame', compact('admission'));
    }


    public function addmissionToExam($id)
    {
        $admission = Admission::find($id);
        $admission->update([
            'step_1' => 1,
            'step_2' => 1,
            'step_3' => 1,


        ]);
        return redirect()->route('dashboard.addmission.getaddmissionStepTwo');
    }

    public function ExamDate($id, Request $request)
    {

        $admission = Admission::find($id);

        $users = User::where('id', '=', $admission->user_id)->first();

        $users->update([
            'date_exam' => $request->examdate,
        ]);

        $admission->update([
            'step_1' => 1,
            'step_2' => 1,
            'step_3' => 1,
            'exam' => 1

        ]);
        $emailSetting = EmailSetting::first();

        $data = array(
            'email' => $admission->email,
            'subject' => ' Exam date',
            'body' => 'Dear Dr:<h4>' . $admission->name . '</h4>
            </br>

            We would like to inform you that your exam date will be conducted on
            ' . $request->examdate . '
            <p>
            If you have any questions, please contact the number below, or reply to this email : ' . $emailSetting->email . '.
            </p>
            We wish you the best of luck
            <p>
            Dr. Amr Rafat
            </p>
            Clinical Director at RDI
            <p>
            002' . $emailSetting->phone . '
            </p>

            ',

        );
        Mail::send('frontend.mailregister', $data, function ($message) use ($data) {
            $message->from('Admission@rdi-int.co.uk', 'Royal Dent Institute');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });


        return redirect()->route('dashboard.addmission.getaddmissionStepThree');


    }

    ////////// change exam date

    public function toChangeExamDate($id)
    {
        $admission = Admission::find($id);

        return view('dashboard.admissions.changeExamDate', compact('admission'));
    }


    public function ChangeExamDate($id, Request $request)
    {

        $admission = Admission::find($id);

        $users = User::where('id', '=', $admission->user_id)->first();

        $old_date = $users->date_exam;


        $users->update([
            'date_exam' => $request->date_exam,
            'old_date_exam' => $old_date,
        ]);

        $admission->update([
            'step_1' => 1,
            'step_2' => 1,
            'step_3' => 1,
            'exam' => 1

        ]);
        $emailSetting = EmailSetting::first();

        $data = array(
            'email' => $admission->email,
            'subject' => 'Change Exam date',
            'body' => 'Dear Dr:<h4>' . $admission->name . '</h4>
            </br>

            The exam date has been changed from to ' . $old_date . ' to the new date ' . $request->date_exam . '


            <p>
            If you have any questions, please contact the number below, or reply to this email : ' . $emailSetting->email . '.
            </p>
            We wish you the best of luck
            <p>
            Dr. Amr Rafat
            </p>
            Clinical Director at RDI
            <p>
            002' . $emailSetting->phone . '
            </p>

            ',

        );
        Mail::send('frontend.mailregister', $data, function ($message) use ($data) {
            $message->from('Admission@rdi-int.co.uk', 'Royal Dent Institute');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });


        return redirect()->route('dashboard.addmission.getaddmissionStepThree');
    }


    //////////////////// waite exame

    public function getaddmissionWaitingExam()
    {
        $admissions = Admission::where([

            ['step_1', '=', 1],
            ['step_2', '=', 1],
            ['step_3', '=', 1],
            ['stutas', '=', 'success'],
            ['exam', '=', 1],

        ])->get();
        return view('dashboard.admissions.waitingExam', compact('admissions'));
    }


    ////////////////// addmission success exam

    public function addmissionSuccessExam($id)
    {
        $admission = Admission::find($id);
        $admission->update([
            'exam' => 1,
        ]);
        return redirect()->route('dashboard.addmission.getaddmissionSuccessExam');
    }

    public function getaddmissionSuccessExam()
    {

        // $admissions = Admission::where('exam','=',1)->get();
        $admissions = Certificat::where('result', '=', 'successful')->get();

        return view('dashboard.admissions.success', compact('admissions'));
    }

    public function subscriptionSuccess($id)
    {
        $admission = Admission::find($id);

        $users = User::where('id', '=', $admission->user_id)->first();

        $users->update([
            'accepted' => 1,
        ]);
        $emailSetting = EmailSetting::first();
        $date = Carbon::parse($emailSetting->registration_date);
        $registration_date = $date->format('y F d');

        $data = array(
            'email' => $admission->email,
            'subject' => 'Acceptance E_mail',
            'body' => 'Dear Dr:<h4>' . $admission->name . '</h4>
            </br>

            <p>

            We are glad to inform you that following your Admission Process, you have been accepted to join the “' . $admission->specializations->name . '” program.
            </br>
            In order to confirm your admission please pay the fees for the first semester in the Center before “' . $registration_date . ' “
            </br>
            <h4>MRD PROGRAM</h4>

            </br>
            <p style="display:block"> -The first term fees for Egyptians are ' . $emailSetting->mrd_egypt . ' Egyptian Pounds  </p>

            </br>
            <p style="display:block"> - The first term fees for Egyptians are ' . $emailSetting->mrd_dollar . ' $ US Dollars  </p>

            </br>
             <h4> MORTH PROGRAM </h4>

            </br>
               <p style="display:block">-The first term fees for Egyptians are ' . $emailSetting->morth_egypt . ' Egyptian Pounds  </p>

            </br>
               <p style="display:block"> - The first term fees for Egyptians are ' . $emailSetting->morth_dollar . ' $ US Dollars   </p>

            </br>

            -Next term fees will be paid on or before ' . $emailSetting->next_date . '.
            </br>

            Wishing you the best of luck in the program.
            </br>

            -Please reply to this email ASAP if you accept this offer--
            </br>

            ' . $emailSetting->email . '
            </br>


            Best Regards,
            </br>
            Royal Dentists Institute
            </br>

            Level 3, 216 Al Mehwar Al Markazi, opposite to 6th of October University hospital,6th of October City, Cairo, Egypt.
            </p>

            </br>
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

        return redirect()->route('dashboard.addmission.getaddmissionSuccessExam');

    }

    ////////////////// addmission fail exam

    public function getaddmissionFailExam()
    {

        // $admissions = Admission::where('exam','=',1)->get();
        $admissions = Certificat::where('result', '=', 'fail')->get();

        return view('dashboard.admissions.failExam', compact('admissions'));
    }

    public function subscriptionFail($id)
    {
        $admission = Admission::find($id);
        $emailSetting = EmailSetting::first();

        $data = array(
            'email' => $admission->email,
            'subject' => 'Admission note for rejection',
            'body' => 'Dear Dr:<h4>' . $admission->name . '</h4>
            </br>



            <p>
            We are sorry to inform you that unfortunately on this occasion you were not selected to join the ' . $admission->specializations->name . ' program this year.
            We have limited seats and a high number of applicants, so we have to rank applicants and admit to our programs the highest ranking candidates based on the number of available seats.
            </p>
            <p>
            Please contact the number below or reply to this email : ' . $emailSetting->email . '
            </br>
            to arrange the collection of your registration fees.
            </p>
            Wishing you all the best in your future endeavours.

            <p>
            Dr. Amr Rafat
            </p>
            Clinical Director at RDI
            <p>
            002' . $emailSetting->phone . '
            </p>

            ',
        );

        Mail::send('frontend.mailregister', $data, function ($message) use ($data) {

            $message->from('Admission@rdi-int.co.uk', 'Royal Dent Institute');
            $message->to($data['email']);
            $message->subject($data['subject']);

        });

        return redirect()->route('dashboard.addmission.getaddmissionFailExam');

    }


    ///////////////// addmission fail

    public function getaddmissionFail()
    {
        $admissions = Admission::where('stutas', '=', 'fail')->get();
        return view('dashboard.admissions.fail', compact('admissions'));
    }

    public function addmissionFail($id)
    {
        $emailSetting = EmailSetting::first();
        $admission = Admission::find($id);
        $admission->update([
            'stutas' => 'fail'
        ]);
        $data = array(
            'email' => $admission->email,
            'subject' => 'Admission note for rejection',
            'body' => 'Dear Dr:<h4>' . $admission->name . '</h4>
            </br>

            <p>
            We are sorry to inform you that unfortunately on this occasion you were not selected to join the ' . $admission->specializations->name . ' program this year.
            We have limited seats and a high number of applicants, so we have to rank applicants and admit to our programs the highest ranking candidates based on the number of available seats.
            </p>
            <p>
            Please contact the number below or reply to this email to arrange the collection of your registration fees.
            </p>
            Wishing you all the best in your future endeavours.

            <p>
            Dr. Amr Rafat
            </p>
            Clinical Director at RDI
            <p>
           002' . $emailSetting->phone . '
            </p>

            ',

        );
        Mail::send('frontend.mailregister', $data, function ($message) use ($data) {
            $message->from('Admission@rdi-int.co.uk', 'Royal Dent Institute');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });


        return redirect()->route('dashboard.addmission.getaddmissionFail');
    }

    public function accepted()
    {
        $admissions = Certificat::all();

        return view('dashboard.admissions.accepted', compact('admissions'));

    }


}
