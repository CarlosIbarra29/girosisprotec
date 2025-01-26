<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\RolPermiso;
use Illuminate\Http\Exceptions\ThrottleRequestsException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
{
    try {

        $credentials = $request->only(['email', 'password','captcha']);
        $validator = Validator::make($credentials, [
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        unset($credentials['captcha']);

        $request->authenticate();

        $request->session()->regenerate();

        $usuario = User::where('email', $request->email)->first();

        $role = Role::where('id', $usuario->role)->first();

        $request->session()->put('menu_color', $role->color_menu); // Variable para el color del menu

        $permisos = RolPermiso::where('role_id', $usuario->role)->get();

        $permiso_array = array();

        foreach ($permisos as $key => $value) {
            $permiso_array[] = $value->permission_id;
        }

        $request->session()->put('permisos', $permiso_array); // Variable para los permisos

        return redirect()->intended(RouteServiceProvider::HOME);
    } catch (ThrottleRequestsException $e) {
        return Redirect::back()->withInput()->withErrors(['email' => 'Demasiados intentos. Por favor intente nuevamente en 10 minutos.']);
    }
}

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function refreshCaptcha (){
        return response()->json(['captcha'=> captcha_img('flat')]);
    }
}
