<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::find(Auth::user()->id)
            ->myTasks()
            ->create([
                'nome' => $request->nome,
                'ramo' => $request->ramo,
                'endereco' => $request->endereco,
                'telefone' => $request->telefone,
                'cnpj' => $request->cnpj
            ]);
        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update([
            'nome' => $request->nome,
            'ramo' => $request->ramo,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'cnpj' => $request->cnpj
        ]);
        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect(route('dashboard'));
    }
}
