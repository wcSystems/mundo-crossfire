<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use DataTables;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Banner::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('imagen', function ($data) { 
                        return '<img src="'.Storage::url('banners/'.$data->img_banner).'" border="0" width="40" class="img-rounded" align="center" />';
                     })
                    ->editColumn('nombre', function ($request) {
                        return $request->img_banner; 
                      })
                    ->editColumn('fecha', function ($request) {
                        return $request->updated_at->format('Y-m-d'); 
                      })
                    ->addColumn('accion', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct">Editar</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Borrar</a>';
                        return $btn;
                    })
                    ->rawColumns(['imagen','accion'])
                    ->make(true);
        }
        return view('Admin.banner');
    }
    public function edit($id)
    {
        return response()->json(Banner::find($id));
    }
    public function store(Request $request)
    {
        // CREAR
        if($request->create_edit==0){
            $image = $request->file('file');
            $imageName = time().'.'.$image->getClientOriginalName();
            Storage::putFileAs('/banners', $image, $imageName);
            $banner = new Banner();
            $banner->img_banner=$imageName;
            $banner->save();
        }
        //PARA EDITAR
        if($request->create_edit==1){
            $name=Banner::where('id',$request->banner_id)->get('img_banner')[0]['img_banner'];
            Storage::delete('banners/'.$name);
            $image = $request->file('file');
            $imageName = time().'.'.$image->getClientOriginalName();
            Storage::putFileAs('/banners', $image, $imageName);
            Banner::where('id',$request->banner_id)->update(['img_banner' => $imageName]);
        }
        return response()->json(['success'=>'Banner Guardado.']);
    }
    public function destroy($id)
    {
        $name=Banner::where('id',$id)->get('img_banner')[0]['img_banner'];
        Storage::delete('banners/'.$name);
        Banner::find($id)->delete();
        return response()->json(['data'=>$name]);
    }
}
