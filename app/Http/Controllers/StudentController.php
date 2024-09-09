<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function create()
    {
        return view('students/create');
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'matriculation' => 'required|string|unique:students|max:255',
        ]);

        // Criação do novo aluno
        Student::create([
            'name' => $request->input('name'),
            'matriculation' => $request->input('matriculation'),
        ]);

        // Redirecionamento ou mensagem de sucesso
        return redirect()->route('studentscreate')->with('success', 'Aluno adicionado com sucesso!');
    }
}

