<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\{User, UserRole};
class UserController extends Controller
{

     public function login(Request $request)
     {
         $user = User::where([
             ['email',  $request->email],
             ['active', 1]
         ])->first();
 
         if ($user) {
             $validHash = Hash::check($request->password, $user->password);
             if ($validHash){
                 session(['user' => $user]);
                 return redirect('dashboard');
             }else{
                 return view('landing')->with('error','Contraseña incorrecta');
             }
         }else{
             return view('landing')->with('error','Usuario no activo / no existe');
         }
     }

    public function index()
    {
        if (!session('user')){return redirect('/logout');}
        $users = User::with(['userRole' => function ($query) {
            $query->select('id', 'name');
        }])
        ->orderBy('id')
        ->get();
        return view('users')->with([
            'users' => $users,
            'userSession'  => session('user'),
        ]);
    }


    public function show($id)
    {
        if (!session('user')){return redirect('/logout');}
        $user = User::where('id',$id)->first();
        $roles = UserRole::where('id','!=',1)->get();
        return view('user_edit')->with([
            'userSession' => session('user'),
            'user'        => $user,
            'roles'       => $roles,
        ]);
    }

    public function update(Request $request)
    {
        User::where('id',$request->user_id)
        ->update([
            'name'            => $request->name,
            'position'        => $request->position,
            'role_id'         => $request->role_id,
            'email'           => $request->email,
            'authorized_ip'   => isset($request->authorized_ip) ? $request->authorized_ip : null,
        ]);

        if ( isset($request->password) && ($request->password === $request->password_confirm) ){
            User::where('id',$request->user_id)
            ->update([
                'password' => Hash::make($request->password),
            ]);
        }
        return redirect()->route('users.index'); 
    }

    public function logout(Request $request)
    {
        session(['user' => null]);
        session()->forget('user');
        return redirect('/');
    }

    public function singUpForm(){
        $roles = UserRole::where('id','!=',1)->get();
        return view('singUpForm')->with([
            'roles'=> $roles,
        ]);
    }

    public function singUp(Request $request){
        $roles = UserRole::where('id','!=',1)->get();
        if (  (isset($request->password) && isset($request->password_confirm)) && ($request->password != $request->password_confirm) ){
            return view('singUpForm')->with([
                'roles'=> $roles,
                'error'=>'Las Contraseñas no coinciden'
            ]);
        }

        if( User::where('email',$request->email)->first() ){
            return view('singUpForm')->with([
                'roles'=> $roles,
                'error'=>'El usuario ya existe'
            ]);
        }

        $userCreate = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'role_id'   => $request->role_id,
            'position'  => $request->position,
            'authorized_ip' => isset($request->authorized_ip) ? $request->authorized_ip : null,
            'password'  => Hash::make($request->password),
            'active'    => 0
        ]);

        if($userCreate){
            return view('singUpForm')->with([
                'roles'=> $roles,
                'success'=>'Usuario creado exitosamente, debe ser activado para poder ingresar',
            ]);
        }
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'rol' => 'required',
        ]);
    

        //User::create($request->all());
        User::create([
            'name' => $request->name,
            'rol' => $request->rol,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'authorized_ip' => isset($request->authorized_ip) ? $request->authorized_ip : null,
        ]);
     
        return redirect()->route('users.index')
                        ->with('success','Usuario creado exitosamente.');
    }


    public function statusUpdateUser(Request $request)
    {
        User::where('id',$request->id)
        ->update([
            'active' => $request->active
        ]);
        return redirect('users');
    }

    public function deleteUser(Request $request)
    {
        User::where('id',$request->id)->delete();
        return redirect('users');
    }

    public function recoveryPasswordForm(Request $request)
    {
        return view('recoveryPasswordForm')->with([
            //'success'=>'Usuario creado exitosamente, debe ser activado para poder ingresar',
        ]);
    }


}
