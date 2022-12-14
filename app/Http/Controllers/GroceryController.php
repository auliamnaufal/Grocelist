<?php

namespace App\Http\Controllers;

use App\Models\Grocery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroceryController extends Controller
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
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|max:255',
            'nominal' => 'required'
        ]);

        $attributes['user_id'] = Auth::id();
        $attributes['checked'] = false;

        Grocery::create($attributes);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grocery  $grocery
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('show', [
            'groceries' => $user
        ]);
    }

    public function showDelete()
    {
        return view('deleted-item', [
            'groceries' => Grocery::where('user_id', Auth::id())->onlyTrashed()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grocery  $grocery
     * @return \Illuminate\Http\Response
     */
    public function edit(Grocery $grocery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grocery  $grocery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grocery $grocery)
    {
        //
    }

    public function toggleCheck(Request $request, Grocery $grocery)
    {
        $grocery->update([
            'checked' => !$grocery['checked']
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grocery  $grocery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grocery $grocery)
    {
        $grocery->delete();
        return back();
    }

    public function deleteAll()
    {
        Grocery::where('user_id', Auth::id())->delete();

        return back();
    }

    public function deleteAllPermanent()
    {
        Grocery::where('user_id', Auth::id())->where('deleted_at', '!=', null)->forceDelete();

        return back();
    }

    public function restoreItem($id)
    {
        Grocery::withTrashed()
            ->find($id)
            ->restore();

        return back();
    }

    public function subscribeUser(User $user)
    {
        if ($user->level == 'unsubscribed') {
            $user->level = 'subscribed';

        } else if ($user->level == 'subscribed') {
            $user->level = 'unsubscribed';
        }
        $user->save();

        return back();
    }
}
