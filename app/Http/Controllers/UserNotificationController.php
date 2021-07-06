<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserNotificationController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => [
            'index'
        ]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('subscribe', [
             'categories' => Category::where('is_active', true)->get()
         ]);
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
        $this->validate($request,
            [
                'category_id' => 'required'
            ]
        );

        $notifications = auth()->user()->notifications()->get();
        if($notifications->isNotEmpty()) {
            $notifications->each->delete();
        }

        foreach($request->category_id as $category){
            Category::find($category)->UserNotifications()->create([
                'user_id' => auth()->user()->id
            ]);
        }

        dd('done');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserNotification  $userNotification
     * @return \Illuminate\Http\Response
     */
    public function show(UserNotification $userNotification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserNotification  $userNotification
     * @return \Illuminate\Http\Response
     */
    public function edit(UserNotification $userNotification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserNotification  $userNotification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserNotification $userNotification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserNotification  $userNotification
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserNotification $userNotification)
    {
        //
    }
}
