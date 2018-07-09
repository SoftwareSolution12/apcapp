<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Perfil;
use Session;
class UsuarioController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }
    
    public function index(){

    	return view('admin.usuarios.index')->with('usuarios',User::all());
    }


    public function create(){
    	return view('admin.usuarios.create')->with('perfis',Perfil::all());
    }

    public function store(Request $request){

    	 $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

    	 User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'perfil_id'=>$request->perfil_id
        ]);


    	 Session::flash('sucesso','Usuario criado com sucesso!');

    	 return redirect()->back();
    }


    public function edit($id){
    	$user=User::find($id);
    	return view('admin.usuarios.edit')
    	->with('perfis',Perfil::all())
    	->with('usuario',$user);
    }

    public function update($id,Request $request){

    	 $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

    	 	$usuario=User::find($id);

            $usuario->name= $request->name;
            $usuario->email=$request->email;
            $usuario->password=bcrypt($request->password);
            $usuario->perfil_id=$request->perfil_id;

            $usuario->save();

    	 Session::flash('sucesso','Perfil atualizado com sucesso!');

    	 return redirect()->back();

    }

    public function destroy($id){
        $user=User::find($id);
        $user->delete();
        Session::flash('usuario deletado com sucesso!');
        return redirect()->back();
    }
}
