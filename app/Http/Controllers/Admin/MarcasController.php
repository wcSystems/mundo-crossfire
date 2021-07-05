<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marcas;
use DataTables;


class MarcasController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Marcas::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function ($data) { 
                        return '<img src="'.Storage::url('marcas/'.$data->img_marcas).'" border="0" width="40" class="img-rounded" align="center" />';
                     })
                    ->editColumn('img_marcas', function ($request) {
                        return substr($request->img_marcas,27); 
                      })
                    ->editColumn('updated_at', function ($request) {
                        return $request->updated_at->format('Y-m-d'); 
                      })
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct">Editar</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Borrar</a>';
                        return $btn;
                    })
                    ->rawColumns(['image','action'])
                    ->make(true);
        }
        return view('Admin.marcas');
    }

    public function store(Request $request)
    {
        // CREAR
        if($request->create_edit==0){
            $image = $request->file('file');
            $imageName = time().'.'.$image->getClientOriginalName();
            Storage::putFileAs('/marcas', $image, $imageName);
            $marcas = new Marcas();
            $marcas->img_marcas=$imageName;
            $marcas->save();
        }
         //PARA EDITAR
         if($request->create_edit==1){
            $name=Marcas::where('id',$request->marcas_id)->get('img_marcas')[0]['img_marcas'];
            Storage::delete('marcas/'.$name);
            $image = $request->file('file');
            $imageName = time().'.'.$image->getClientOriginalName();
            Storage::putFileAs('/marcas', $image, $imageName);
            Marcas::where('id',$request->marcas_id)->update(['img_marcas' => $imageName]);
        }
        return response()->json(['success'=>'Marca Guardado.']);
    }

    public function edit($id) { return response()->json(Marcas::find($id)); }

    public function destroy($id)
    {
        $name=Marcas::where('id',$id)->get('img_marcas')[0]['img_marcas'];
        Storage::delete('marcas/'.$name);
        Marcas::find($id)->delete();
        return response()->json(['success'=>'Marcas Borrado Exitosamente!']);
    }
}
