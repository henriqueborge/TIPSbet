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
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $extension = $image->getClientOriginalExtension();
        $name = time() . '.' . $extension;

        // Move the file to the public/images folder
        $image->move(public_path('images'), $name);

        $publicPath =  $name;
    } else {
        // If no image is uploaded, maintain the previous image or set it to null as per your requirements
        $publicPath = auth()->user()->imagem; // Replace 'imagem' with your actual field name
    }

    auth()->user()->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'imagem' => $publicPath,
    ]);

    return back()->withStatus(__('Perfil atualizado com sucesso.'));
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
