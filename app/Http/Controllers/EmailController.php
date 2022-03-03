<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if (!Auth::user()->isPR) {
            abort(403);
        }

        $emails = Email::all();

        return view('emails.edit', compact('emails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmailRequest  $request
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Auth::user()->isPR) {
            abort(403);
        }

        foreach ($request->id as $key => $id) {
            $email = Email::find($id);
            $email->update([
                'subject' => $request->subject[$key],
                'body' => $request->body[$key],
            ]);
        }

        return redirect()->route('emails.edit');
    }
}
