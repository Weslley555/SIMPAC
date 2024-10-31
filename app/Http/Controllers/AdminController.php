<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function showLoginForm()
    {
        return view('Adm_views.Login_Adm');
    }

    public function authenticate(Request $request)
    {
    $request->validate([
        'email' => 'required|string',
        'senha' => 'required|string',
    ]);

    $email = $request->input('email');
    $senha = $request->input('senha');
    $admin = Admin::where('email', $email)->first();

    if ($admin && Hash::check($senha, $admin->senha)) {
        $request->session()->put('admin_id', $admin->id);
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors(['message' => 'Credenciais inválidas!']);
    }

    public function dashboard()
    {
        return view('Adm_views.Tela_ini_adm');
    }

    public function create()
    {
        return view('Adm_views.cadastrar_admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'matricula' => 'required|string|max:255|unique:admins',
            'email' => 'required|email|unique:admins,email',
            'senha' => 'required|string|min:8',
        ]);

        Admin::create([
            'nome' => $request->nome,
            'matricula' => $request->matricula,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
        ]);

        return redirect()->route('admin.gerenciar_usuarios')->with('success', 'Administrador cadastrado com sucesso!');
    }

    public function gerenciarUsuarios()
    {
        $admins = Admin::all();
        return view('Adm_views.gerenciar_usuarios', compact('admins'));
    }

    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();
        return redirect()->route('admin.gerenciar_usuarios')->with('success', 'Administrador deletado com sucesso!');
    }
}
