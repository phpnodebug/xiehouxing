<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Note;
use App\NoteComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class AdminNoteCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = '';
        if ($request->has('key')){
            $key = $request->input('key');
            $query = NoteComment::where('title','like','%'.$key.'%')->orWhere('content','like','%'.$key.'%');
        }else{
            $query = NoteComment::select();
        }
        $comments = $query->orderBy('note_id','asc')->orderBy('id','desc')->with('note','user')->paginate(20);
        return view('admin.notes.comments',compact('key','comments'));
    }

    public function setBest(Request $request,$id)
    {
        $comment = NoteComment::findOrFail($id);
        $comment->isbest = $request->input('value');
        $comment->save();
        return redirect(URL::previous());
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $note = NoteComment::findOrFail($id)->note;
        NoteComment::destroy($id);
        Note::updateCommentCount($note);
        if ($request->has('redirect_to')){
            return redirect($request->input('redirect_to'));
        }
    }
}
