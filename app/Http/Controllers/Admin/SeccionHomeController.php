<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seccion;
use DataTables;

class SeccionHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Seccion::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function ($data) { 
                        return '<img src="'.Storage::url('seccion/'.$data->img).'" border="0" width="40" class="img-rounded" align="center" />';
                    })
                    ->editColumn('updated_at', function ($request) {
                        return $request->updated_at->format('Y-m-d'); 
                      })
                    ->addColumn('action', function($row){
                        
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" class="ver btn btn-primary btn-sm">Ver</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct">Editar</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Borrar</a>';
                        return $btn;
                    })
                    ->rawColumns(['image','action'])
                    ->make(true);
        }
        $count=Seccion::count();
        return view('Admin.seccion')->with('count',$count);
    }

    public function store(Request $request)
    {
        // CREAR
        if($request->create_edit==0){
            $image = $request->file('img_seccion');
            $imageName = time().'.'.$image->getClientOriginalName();
            Storage::putFileAs('/seccion', $image, $imageName);
            $seccion = new Seccion();
            $seccion->link=$request->link;
            $seccion->texto=$request->descripcion_seccion;
            $seccion->img=$imageName;
            $seccion->save();
        }
        //PARA EDITAR
        if($request->create_edit==1){
            if ($request->file('img_seccion')==null) {
                Seccion::where('id',$request->seccion_id)->update(['link' => $request->link,'texto'=>$request->descripcion_seccion]);
            }else{
                $name=Seccion::where('id',$request->seccion_id)->get('img')[0]['img'];
                Storage::delete('seccion/'.$name);
                $image = $request->file('img_seccion');
                $imageName = time().'.'.$image->getClientOriginalName();
                Storage::putFileAs('/seccion', $image, $imageName);
                Seccion::where('id',$request->seccion_id)->update(['link' => $request->link,
                                          'texto'=>$request->descripcion_seccion,
                                          'img'=>$imageName]);
            }
        }
        return response()->json(['success'=>'Seccion Guardado.']);
    }

    public function edit($id){ return response()->json($seccion= Seccion::find($id)); }

    public function destroy($id)
    {
        $name=Seccion::where('id',$id)->get('img')[0]['img'];
        Storage::delete('seccion/'.$name);
        Seccion::find($id)->delete();
        return response()->json(['success'=>$name]);
    }
}
