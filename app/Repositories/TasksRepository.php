<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

final class TasksRepository
{
    private $authUserId;

    public function __construct()
    {
        $authUser = auth('sanctum')->user();

        if (is_null($authUser)) {
            throw new \Exception('User not authenticated', 401);
        }

        $this->authUserId = $authUser->id;
    }

    public function list(): Collection
    {

        return Task::where('user_id', $this->authUserId)->get();
    }

    public function create(Request $request): ?Task
    {
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = $this->authUserId;
        $task->save();

        return $task;
    }

    public function update(Request $request): ?Task
    {
        $id = $request->get('id');

        $task = Task::where('id', $id)
            ->where('user_id', $this->authUserId)
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
            ->where('user_id', $this->authUserId)
            ->first();
        if (is_null($task)) {
            return false;
        }

        $task->delete();

        return true;
    }
}
