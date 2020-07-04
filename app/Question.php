<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    protected $fillable = ['email','title', 'content','create_at','update_at'];
    public $timestamps = false;

    public static function getAll()
    {
    	$result = DB::table('questions')->get();
    	return $result;
    }
    
    public static function get($id)
    {
    	$result = DB::table('questions')->where('id',$id)->first();
    	return $result;
    }
    public static function insert($data)
    {
        $time_create = time();
        DB::table('questions')->insert([
            'title' => $data['title'],
            'email' => $data['email'],
            'content' => $data['content'],
            'create_at' => $time_create,
            'update_at' => 0
        ]);
    }

    public static function edit($id, $data)
    {
    	$timeUpdate = time();
    	DB::table('questions')
    	->where('id',$id)
    	->update(['email' => $data['email'],'title' => $data['title'],'content' => $data['content'], 'update_at' => $timeUpdate]);
    }
}
