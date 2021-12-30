<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Account::class, 'account');
        $this->middleware('password.confirm')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::orderBy('identifier')->get();

        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = Account::create(array_merge(
            $request->all(),
            ['password' => Str::random(40)],
        ));

        if (Auth::user()->isAdmin && $request->role) {
            $account->role = $request->role;
            $account->save();
        }

        return redirect()->route('accounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account   $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account   $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account   $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $account->update($request->all());

        if (Auth::user()->isAdmin) {
            $account->role = $request->role;
            $account->save();
        }

        return redirect()->route('accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account   $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('accounts.index');
    }
}
