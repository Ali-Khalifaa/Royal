<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{
    public function index()
    {  
        $questions = Question::all();
        return view('dashboard.questions.index',compact('questions'));
    }

    public function create()
    {
        $questions = Question::all();
        return view('dashboard.questions.create',compact('questions'));
    }
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return view('dashboard.questions.show',compact('question'));
    }


    public function store(Request $request)
    {
        $question = Question::create([
            'question' => $request->question,
        ]);
        
        $question_id=$question->id;
        $arrName=$request->chooses;
        $corrects=$request->correct;
        $correct_answer = $corrects['is_correct'];
        
       
        foreach ($arrName as $index=>$attr){
            
            if($index == $correct_answer){
                $answers = Answer::create([
                    'answer' => $attr,
                    'is_correct' => 1,
                    'question_id' => $question_id,
    
                ]);
            }else{
                $answers = Answer::create([
                    'answer' => $attr,
                    // 'is_correct' => $attr['isCorrect'],
                    'question_id' => $question_id,
    
                ]);
            }
          
           
            
           
           
        }
        return redirect()->route('dashboard.question.index');
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);


        return view('dashboard.questions.edit',compact('question'));
    }

    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $question->update([
         'question' => $request->question,
        ]);
 
        $answers=Answer::where('question_id', '=', $id)->get();
        $question_id=$question->id;
        $arrName=$request->chooses;
        $corrects=$request->correct;
        $correct_answer = $corrects['is_correct'];


        foreach ($answers as $index=>$answerss){
            $indexOfSecion = $index;
            foreach ($arrName as $index=>$attr){
                
                if ($index ==$indexOfSecion) {
                    if($index == $correct_answer){
                        $answerss->update([
                            'answer' => $attr,
                            'is_correct' => 1,
                            'question_id' => $question_id,
        
                        ]);
                    }else{
                        $answerss->update([
                            'answer' => $attr,
                            'is_correct' => 0,
                            'question_id' => $question_id,
        
                        ]);
                    }
                    
                }
            
            }
        
        
        }









        
        // foreach ($answers as $index=>$answerss){
        //     $indexOfSecion = $index;
        //     foreach ($arrName as $index=>$attr){
                
        //         if ($index ==$indexOfSecion) {
        //             $answerss->update([
        //                 'answer' => $attr['choose'],
        //                 'is_correct' => $attr['isCorrect'],
        //                 'question_id' => $question_id,
    
        //             ]);
        //         }
            
        //     }
        
        
        // }

        return redirect()->route('dashboard.question.index');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        $question->delete();
        return \redirect()->route('dashboard.question.index');
    }
}
