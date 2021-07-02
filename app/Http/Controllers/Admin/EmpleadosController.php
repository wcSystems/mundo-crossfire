<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empl=User::where('id',Auth::id())->sum('role_id');
        if($empl==2){
            return redirect('/admin-index');
        }
        
        if ($request->ajax()) {
            $data = User::Orwhere('role_id',1)->OrWhere('role_id',2)->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('updated_at', function ($request) {
                        return $request->updated_at->format('Y-m-d'); 
                      })
                      ->editColumn('role_id', function ($request) {
                          if($request->role_id==1){
                            return 'Administrador'; 
                          }
                          if($request->role_id==2){
                            return 'Empleado'; 
                          }
                      })
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct">Editar</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Borrar</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('Admin.empleados');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->create_edit==0){
            $user = new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->role_id=$request->role_id;
            $user->save();

        }else{

            $user = User::find($request->empleado_id);
            $user->name=$request->name;
            $user->role_id=$request->role_id;
            $user->save();
        
        }
    
        return response()->json(['success'=>'Empleado Guardado.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado= User::find($id);
        return response()->json($empleado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json(['success'=>'Empleado Borrado Exitosamente!']);
    }
}
