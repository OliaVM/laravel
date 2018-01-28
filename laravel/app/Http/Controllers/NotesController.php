<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class NotesController extends Controller
{
	//show notes
	public function show (Request $request) { //display information from database 
		$notes = DB::table('notes')
            ->join('users', 'notes.user_id', '=', 'users.id')
            ->select('notes.id', 'notes.user_id', 'notes.note_date', 'notes.note_title', 'notes.note_text', 'users.name')
            ->orderBy('notes.note_date')
            ->get();
      
        $request->session()->put('key2.first', 'value1');
        $result = $request->session()->all();
        //dump($result);
    	return view('notes/notes_list_show_for_all', ['notes' => $notes]);
	}

    //add note in database - Work with database: Adding the text information and the date
	public function add (Request $request) {
		if ($request->isMethod("post")) { //if(isset($_POST["go"]))
			$note_title = $request->input('note_title'); //, 'default'
			$note_text = $request->input('note_text'); 
			$note_date = $this->GetFullNowDateInCity(7);

			$this->validate($request, [
			    'note_title' => 'required|alpha_dash|max:50', //если не пустое значение параметра.Проверка на наличие только букв, цифр, тире и символа подчеркивания
			    'note_text' => 'required|max:5000'
		  	]); 

			DB::insert("INSERT INTO notes (user_id, note_title, note_text, note_date) VALUES (:user_id, :note_title, :note_text, :note_date)", ['user_id' => '1', 'note_title' => $note_title, 'note_text' => $note_text, 'note_date' =>$note_date]); 
			echo "Запись добавлена";

	    } 
	    return view('notes/notes_add');
	}


	public function delete_with_post (Request $request) {
		$note_delete = $request->input('note_del_id'); 
		//if  ($author_id == $session_author_id)
		$author_id = $request->input('author_id'); 
		$session_author_id = $request->session()->put('author_id', $author_id);
		$result = $request->session()->all();
    	$session_author_id = $request->session()->get('author_id');
		DB::delete("DELETE FROM notes WHERE id=:id and user_id=:user_id", ['id' => $note_delete, 'user_id' => $session_author_id]); 
		echo "Запись удалена";
		return view('main');
	}


	public function delete (Request $request, $note_delete) {
		//if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
		//if (isset($_POST['button_del'])) { 
		//if ($request->isMethod("post")) {
			$author_id = $request->input('author_id'); 
			$request->session()->put('author_id', $author_id);
			$result = $request->session()->all();
        	$session_author_id = $request->session()->get('author_id');
			DB::delete("DELETE FROM notes WHERE id=:id and user_id=:user_id", ['id' => $note_delete, 'user_id' => $session_author_id]); //$_SESSION

			echo "запись удалена";
		return view('main');
	}


	//update GET
	public function update_get(Request $request, $update_note) {
		$notes = DB::select("SELECT * FROM notes WHERE id=:id and user_id=:user_id", ['id' => $update_note, 'user_id' => '1']); //  $_SESSION['login']
		//if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
	    return view('notes/edit_notes', ['notes' => $notes, 'update_note' => $update_note]);
	}


	//update POST
	public function update_post(Request $request, $update_note) { 
		//if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
		if ($request->isMethod("post")) {
			$note_text = $request->input('note_text', 'default');
			$note_title = $request->input('note_title', 'default');
			$this->validate($request, [
			    'note_title' => 'required|alpha_dash|max:50', 
			    'note_text' => 'required|max:5000'
		  	]); 
			$result = DB::update("UPDATE notes SET  note_text =:note_text, note_title =:note_title WHERE id =:id", ['note_text' => $note_text, 'note_title' => $note_title, 'id' => $update_note]); //note_date=:note_date,
			//view after post
			echo "Запись обновлена";
			return view('main');
		}
	}


	// add date of notes
	public function GetFullNowDateInCity($timezoneInCity){
		$FullNowDateInCity = date('d.m.Y H:i', (time()+$timezoneInCity*60*60));
		return $FullNowDateInCity;
	}
}
