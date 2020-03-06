<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $errors = [

        ];

        if ($request->isMethod('post')) {
            $this->validate($request, $this->validateRules(), [], $this->attributeNames());
            if (Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('new_password')),
                    'email' => $request->post('email'),
                ]);
                $user->save();
                return redirect()->route('admin.updateProfile')->with('success', 'Данные успешно изменены');
            } else {
                $errors['password'][] = 'Неверно введен текущий пароль';
            }
            return redirect()->route('admin.updateProfile')->withErrors($errors);
        }

        return view('admin.profile', [
            'user' => $user,
        ]);
    }

    public function validateRules()
    {
        return [
            'name' => 'required|string|max:10',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'required',
            'new_password' => 'required|string|min:3|confirmed'
        ];
    }

    protected function attributeNames()
    {
        return [
            'new_password' => 'Новый пароль',
        ];
    }
}
