<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Answer extends Model
{
	protected $fillable = ['answers_content', 'questions_id'];
    public $timestamps = false;

    public static function getAll($id)
    {
    	$result = DB::table('answers')
    			->where('questions_id',$id)
    			->get();
    	return $result;
    }

    public static function insert($pertanyaanId, $data)
    {
    	$timeCreate = time();
        DB::table('answers')->insert([
                'email' => $data['email'],
                'answers_content' => $data['content'],
                'create_at' => $timeCreate,
                'update_at' => 0,
                'questions_id' => $data['pertanyaanId']
        ]);
    }
    public static function get($id)
    {
        $result = DB::table('answers')->where('id', $id)->first();

        return $result;
    }

    public static function edit($data)
    {
        DB::table('answers')->where('id',$data['answer_id'])->update(['answers_content' => $data['content']]);
    }
}
