<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function Spatie\Ignition\ErrorPage\jsonEncode;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('main');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $prompt = $request->input('prompt');

        $body   = [
            'model'=>'gpt-3.5-turbo',
            'messages'=>[
                ['role'=>'user','content'=>$prompt]
            ]
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . env('CHATGPT_API_KEY')
        ])->send('POST', 'https://api.openai.com/v1/chat/completions', [
            'body' => json_encode($body)
        ])->json();

        $response   = $response['choices'][0]['message']['content'];

        return view('response', ['response' => $response]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
