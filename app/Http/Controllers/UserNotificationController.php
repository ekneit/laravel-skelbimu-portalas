<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\UserNotification;
use App\Service\UserNotificationManager;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserNotificationController extends Controller
{
    private $userNotificationManager;
    public function __construct(UserNotificationManager $userNotificationManager) {
        $this->middleware('auth', ['except' => [
            'index'
        ]]);

        $this->userNotificationManager = $userNotificationManager;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notificationsArray = [];
        $notifications = auth()->user()->notifications()->get();
        foreach ($notifications as $notification) {
            array_push($notificationsArray, $notification['category_id']);
        }

        return view('subscribe', [
            'categories' => Category::where('is_active', true)->get(),
            'notifications' => $notificationsArray
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
        $this->userNotificationManager->create($request);

        return redirect()->route('dashboard');

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
