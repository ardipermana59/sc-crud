<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($pertanyaanId, Request $request)
    {
        // $time = time();
        // DB::table('answers')->insert([
        //     'answer_title' => $request->title,
        //     'answer_email' => $request->email,
        //     'answer_content' => $request->content,
        //     'create_at' => $time,
        //     'update_at' => 0
        // ]);
        Answer::insert($pertanyaanId, $request->all());
        return redirect('/jawaban/'.$pertanyaanId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = DB::table('questions')
            ->select('questions.*','answers.id as kkl')
            ->join('answers', 'questions.id', '=', 'answers.questions_id')
            ->where('questions.id', 1)
            ->get();
            dd($users);
        return view('jawaban/detail', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit($aId, $qId)
    {
        $data = Answer::get($aId);
        // dd($data);
        return view('/jawaban/edit',['data' => $data, 'qId' => $qId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        Answer::edit($request->all());
        return redirect('/jawaban/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
