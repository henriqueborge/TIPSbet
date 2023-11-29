<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function desativar(){
        $id=auth()->user()->id;
        $user= User::find($id);
        $user-> status='d';
        $user->update();
        Auth::logout();
        return redirect('/');
        
    }
    public function atualizarImagem(Request $request)
    {
        // Valide o formulário, certifique-se de que o arquivo é uma imagem, etc.
        $request->validate([
            'nova_imagem' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Salve a nova imagem no sistema de arquivos
        $imagem = $request->file('nova_imagem');
        $caminhoImagem = $imagem->store('caminho/para/armazenar', 'public');

        // Atualize o caminho da imagem no banco de dados para o usuário autenticado
        auth()->user()->update(['caminho_imagem' => $caminhoImagem]);

        return redirect()->back()->with('success', 'Foto atualizada com sucesso.');
    }

}
