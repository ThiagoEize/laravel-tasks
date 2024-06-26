<?php

namespace App\Http\Controllers;

use App\Repositories\TasksRepository;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    private $tasksRepository;

    public function __construct(TasksRepository $tasksRepository)
    {
        $this->tasksRepository = $tasksRepository;
    }

    public function list(): JsonResponse
    {
        try {
            $tasks = $this->tasksRepository->list();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to read the task list'], 500);
        }

        return response()->json(
            $tasks,
            200
        );
    }

    public function create(Request $request): JsonResponse
    {
        $task = $this->tasksRepository->create($request);

        return response()->json(
            [
                'message' => 'Task successfully created',
                'task' => $task
            ],
            200
        );
    }

    public function update(Request $request): JsonResponse
    {
        $task = $this->tasksRepository->update($request);

        if (is_null($task)) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        return response()->json(
            [
                'message' => 'Task successfully updated',
                'task' => $task
            ],
            200
        );
    }

    public function delete(Request $request): JsonResponse
    {
        $id = $request->get('id');

        $taskDeleted = $this->tasksRepository->delete($id);

        if ($taskDeleted) {
            return response()->json(['message' => 'Task successfully deleted'], 200);
        }

        return response()->json(['error' => 'Task not found'], 404);
    }
}
