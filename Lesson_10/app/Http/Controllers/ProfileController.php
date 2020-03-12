<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{

    public function index()
    {
        $users = User::query()->paginate(12);
        return view('admin.users', ['users' => $users]);
    }

    public function edit(User $user)
    {
        return view('admin.modifyUser', [
            'user' => $user,
        ]);
    }


    public function update(User $user, Request $request)
    {
        $errors = [];

        if ($request->isMethod('PUT')) {
            $this->validate($request, $this->validateRules(), [], User::attributeNames());
            if (Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('new_password')),
                    'email' => $request->post('email')
                ]);
                $user->save();
                return redirect()->route('admin.users.index')->with('success', 'Данные успешно изменены');
            } else {
                $errors['password'][] = 'Неверно введен текущий пароль';
            }
            return redirect()->route('admin.users.index')->withErrors($errors);
        } else if ($request->isMethod('PATCH')) {
            $this->validate($request, $this->validateRulesAlt($user), [], User::attributeNames());

            if ($request->post('is_admin')) {
                $user->fill([
                    'is_admin' => true
                ]);
            } else {
                $user->fill([
                    'is_admin' => false
                ]);
            }
            $user->fill([
                'name' => $request->post('name'),
                'email' => $request->post('email')
            ]);

            $user->save();
            return redirect()->route('admin.users.index')->with('success', 'Данные успешно изменены');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        if ($user) {
            return redirect()->route('admin.users.index')->with('success', 'Пользователь удален');
        } else {
            return redirect()->route('admin.users.index')->with('error', 'Ошибка удаления');
        }

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

    public function validateRulesAlt($user)
    {
        return [
            'name' => 'required|string|max:10',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ];
    }


}
