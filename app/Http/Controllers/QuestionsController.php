<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\Replies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows   = Questions::orderByDesc('created_at')->get();
        $data   = ['rows'=>$rows];
        return view('questions.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $description= $request->input('description');

        // Insert Question
        $orm    = new Questions;
        $orm->title       = $request->title;
        $orm->description = $description;
        $orm->writer_name = $request->writer_name;
        $result = $orm->save();
        $questionSeq    = $orm->seq;

        // Insert reply
        if($result) {
            $content    = $request->title. ' '.$description;
            $body   = [
                'model'=>'gpt-3.5-turbo',
                'messages'=>[
                    ['role'=>'user','content'=>$content]
                ]
            ];

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('CHATGPT_API_KEY')
            ])->send('POST', env('CHATGPT_API_URL'), [
                'body' => json_encode($body)
            ])->json();

            $response   = $response['choices'][0]['message']['content'];

            $orm    = new Replies;
            $orm->questions_seq = $questionSeq;
            $orm->description   = $response;
            $orm->writer_name   = 'ChatGPT';
            $orm->save();
        }

        return redirect()->route('questions.show', ['seq'=>$questionSeq]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row    = Questions::find($id);
        $data   = ['row'=>$row];

        return view('questions.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
