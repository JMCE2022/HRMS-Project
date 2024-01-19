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
        $notification ['notify'] = DB::select("SELECT users.id, users.name, users.lastname, users.email, COUNT(is_read) AS unread FROM users LEFT JOIN messages ON users.id = messages.from AND messages.is_read = 0 WHERE users.id = " . Auth::id() . " GROUP BY users.id, users.name, users.lastname, users.email");

        $viewPath = Auth::user()->user_type == 0
            ? 'superadmin.announcement.announcement'
            : (Auth::user()->user_type == 1
                ? 'admin.announcement.announcement'
                : 'employee.dashboard');
    
        return view($viewPath,$notification);
    }
    
    public function save_task(Request $request)
{
    $task = new Task;

    $request->validate([
        'title' => 'required|string|max:50',
        'description' => 'required|string',
    ], [
        'title.required' => 'The title field is required.',
        'description.required' => 'The description field is required.',
    ]);

    $task->title = $request->title;
    $task->description = $request->description;

    $title = $request->title;

    $users = User::all(); // Get all users

    foreach ($users as $user) {
        $message = new Message;
        $message->from = $user->id;
        $message->message = $title;
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

        $data = ['from' => $user->id];
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    $task->save();

    broadcast(new TaskCreated($task, $message));

    return redirect()->back()->with('success', 'Task successfully added');
}


}
