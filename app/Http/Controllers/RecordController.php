<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Record;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\RecordAccessMail;

class RecordController extends Controller
{
    public function createRecord()
    {
        return view('records.create');
    }
    public function recordStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'password' => 'required|string|min:6',
            'email' => 'required|email',
        ]);

        $record = Record::create([
            'title' => $request->title,
            'description' => $request->description,
            'password' => bcrypt($request->password),
        ]);

        $url = route('records.show', $record->id);


        Mail::to($request->email)->send(new RecordAccessMail($url, $request->password));

        return redirect()->route('records.create')->with('success', 'Record created and email sent!');
    }
    public function recordShow($id)
    {
        $record = Record::findOrFail($id);
        return view('records.show', compact('record'));
    }
    public function recordVerify(Request $request, $id)
    {
        $record = Record::findOrFail($id);
        // dd($record);

        if (password_verify($request->password, $record->password)) {
            return view('records.view', compact('record'));
        }

        return back()->withErrors(['password' => 'Incorrect password']);
    }

}
