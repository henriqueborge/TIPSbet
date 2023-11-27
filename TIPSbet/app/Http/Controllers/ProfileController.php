<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'Telefone' => 'required|string|max:20',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

       
        
        $image = $request->file('profile_image');
        $extension = $image->getClientOriginalExtension();
        $name = time() . '.' . $extension;
      
        
        // Mova o arquivo para a pasta public/images
        $image->move(public_path('images'), $name);
        
       
        $publicPath = 'images/' . $name;
        
       
        auth()->user()->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'Telefone' => $request->input('Telefone'),
            'imagem' =>  $name,
        ]);

       

        return redirect()->route('profile.edit')->with('success', 'Perfil atualizado com sucesso.');
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Senha atualizada com sucesso.'));
    }
}
