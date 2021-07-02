<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Banner::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function ($data) { 
                        $url= asset($data->img_banner);
                        return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
                     })
                    ->editColumn('img_banner', function ($request) {
                        return substr($request->img_banner,28); 
                      })
                    ->editColumn('updated_at', function ($request) {
                        return $request->updated_at->format('Y-m-d'); 
                      })
                    ->addColumn('action', function($row){
   
                        //$btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" class="ver btn btn-primary btn-sm">Ver</a>';
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct">Editar</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Borrar</a>';
                        return $btn;
                    })
                    ->rawColumns(['image','action'])
                    ->make(true);
        }
        
        return view('Admin.banner');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // PARA CREAR
        if($request->create_edit==0){

            $image = $request->file('file');
            $imageName = time().'.'.$image->getClientOriginalName();
            $image->move(storage_path('app/public/banners'),$imageName);

            $banner = new Banner();
            $banner->img_banner='/storage/banners/'.$imageName;
            $banner->save();

        }

        //PARA EDITAR
        if($request->create_edit==1){
            //BORRO LA IMAGEN
            $archivos=Banner::where('id',$request->banner_id)->get('img_banner');

            foreach($archivos as $archivo){
                $route = explode("/", $archivo->img_banner);
                Storage::disk('public')->delete('banners/'.$route[3]);
            }

            $image = $request->file('file');
            $imageName = time().'.'.$image->getClientOriginalName();
            $image->move(storage_path('app/public/banners'),$imageName);

            Banner::where('id',$request->banner_id)->update(['img_banner' => '/storage/banners/'.$imageName]);


        }

        return response()->json(['success'=>'Banner Guardado.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner=Banner::where('id',$id)->first();

        return response()->json($banner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner= Banner::find($id);
        return response()->json($banner);
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
        $archivos=Banner::where('id',$id)->get('img_banner');

        foreach($archivos as $archivo){
            $route = explode("/", $archivo->img_banner);
            Storage::disk('public')->delete('banners/'.$route[3]);
        }
        
        Banner::find($id)->delete();

        return response()->json(['success'=>'Banner Borrado Exitosamente!']);
    }
}
