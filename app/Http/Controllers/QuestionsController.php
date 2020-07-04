<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::getAll();
        return view('pertanyaan/index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertanyaan/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
    
        Question::insert($request->all());
        return redirect('/pertanyaan')->with('success','Berhasil membuat pertanyaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Question::get($id);
        $answers = Answer::getAll($id);
        // dd($answer);
        return view('/jawaban/detail', ['data' => $data, 'answers' => $answers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function editForm($id)
    {
        $question = Question::get($id);
        return view('/pertanyaan/edit', compact('question'));
    }
    public function edit($id, Request $request)
    {
        $editQuestion = Question::edit($id, $request->all());

        return redirect('/pertanyaan')->with('edit-pertanyaan','Pertanyaan berhasil di edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Question::delete($id);
        DB::table('questions')->where('id',$id)->delete();
        return redirect('/pertanyaan')->with('destroy','Pertanyaan Berhasil dihapus');
    }
}
