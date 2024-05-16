<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class TasksRepository
{
    public function list()
    {
        return Task::where('user_id', auth('sanctum')->user()->id)->get();
    }

    public function create(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = auth('sanctum')->user()->id;
        $task->save();

        return $task;
    }

    public function update(Request $request)
    {
        $id = $request->get('id');

        $task = Task::where('id', $id)
            ->where('user_id', auth('sanctum')->user()->id)
            ->first();

        if (is_null($task)) {
            return null;
        }

        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();

        return $task;
    }

    public function delete(int $id): bool
    {
        $task = Task::where('id', $id)
            ->where('user_id', auth('sanctum')->user()->id)
            ->first();
        if (is_null($task)) {
            return false;
        }

        $task->delete();

        return true;
    }
}
