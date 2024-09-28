<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Company;
use App\Rules\CompanyExists;
use App\Rules\UserExists;
use Illuminate\Database\QueryException;

class TaskController extends Controller
{
    public function createTask(Request $request)
    {
        try {
            $request->validate([
                'company_id' => ['required', 'integer', new CompanyExists],
                'name' => 'required|string',
                'description' => 'required|string',
                'user_id' => ['required','integer', new UserExists]
            ],[
                'company_id.required' => 'El campo company_id es obligatorio.',
                'company_id.integer' => 'El campo company_id debe ser un número entero.',
                'name.required' => 'El campo nombre es obligatorio.',
                'name.string' => 'El campo nombre debe ser una cadena de texto.',
                'description.required' => 'El campo descripción es obligatorio.',
                'user_id.required' => 'El campo user_id es obligatorio.',
                'user_id.integer' => 'El campo user_id debe ser un número entero.',
            ]);

   
            $pendingTasks = Task::where('user_id', $request->user_id)
                ->where('is_completed', 0)
                ->count();

            if ($pendingTasks >= 5) {
                return response()->json([
                    'message' => 'El usuario ya tiene 5 tareas pendientes'
                ], 400);
            }

            $task = Task::create([
                'company_id' => $request->company_id,
                'name' => $request->name,
                'description' => $request->description,
                'user_id' => $request->user_id,
                'is_completed' => 0,
            ]);

            return response()->json($task, 201);

        } catch (QueryException $e) {
          
            return response()->json([
                'message' => 'Error al crear la tarea. ' . $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
        
            return response()->json([
                'message' => 'Error inesperado: ' . $e->getMessage(),
            ], 500);
        }
    }

}
