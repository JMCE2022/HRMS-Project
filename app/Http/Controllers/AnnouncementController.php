<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\User;
use App\Models\Message;
use Pusher\Pusher;
use DB;
use App\Events\TaskCreated;

class AnnouncementController extends Controller
{
    public function announcement()
    {
        $notification['notify'] = DB::select("
    SELECT
        users.id,
        users.name,
        users.lastname,
        users.email,
        COUNT(messages.is_read) AS unread
    FROM
        users
    LEFT JOIN
        messages ON users.id = messages.send_to AND messages.is_read = 0
    WHERE
        users.id = " . Auth::id() . "
    GROUP BY
        users.id, users.name, users.lastname, users.email
");



        $query = Message::getNotify();
        $getNot['getNotify'] = $query->orderBy('id', 'desc')->take(10)->get();

        $users['users'] = User::all();

        $viewPath = Auth::user()->user_type == 0
            ? 'superadmin.announcement.announcement'
            : (Auth::user()->user_type == 1
                ? 'admin.announcement.announcement'
                : 'employee.dashboard');
    
        
        return view($viewPath,[
            'notification' => $notification,
            'getNot' => $getNot,
            'users' =>  $users['users'], // Access the 'users' array directly
        ]);
    }

    public function read($id){

        $read = Message::getID($id);
        $read->is_read=1;
        $read->save();
        return redirect()->back();
    }
    
    public function save_task(Request $request)
{
    $task = new Task;

    $request->validate([
        'title' => 'required|string|max:50',
        'description' => 'required|string',
        'scheduled_date' => 'required|date',
        'selected_users' => 'nullable|array', // Add this line for selected users
    ], [
        'title.required' => 'The title field is required.',
        'description.required' => 'The description field is required.',
        'schedule_date.required' => 'The Scheduled field is required.',
    ]);

    $task->title = $request->title;
    $task->description = $request->description;
    $task->scheduled_date = $request->input('scheduled_date') ? trim($request->input('scheduled_date')) : null;

    $title = $request->title;
    $description = $request->description;

    // Check if specific users are selected
    $selectedUsers = $request->input('selected_users', []);

    // Get users based on selection
    $users = $selectedUsers ? User::whereIn('id', $selectedUsers)->get() : User::all();

    foreach ($users as $user) {
        $message = new Message;
        $message->send_to = $user->id;
        $message->from = Auth::user()->name;
        $message->profile_pic = Auth::user()->profile_pic;
        $message->title_message = $title;
        $message->description_message = $description;
        $message->save();

        // Send notification to each user using Pusher or any other method you're using
        $options = [
            'cluster' => 'ap2',
            'useTLS' => true,
        ];

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['send_to' => $user->id];
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    $task->save();

    broadcast(new TaskCreated($task, $message));

    return redirect()->back()->with('success', 'Announcement successfully sent');
}



}
