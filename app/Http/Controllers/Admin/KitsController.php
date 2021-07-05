<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kit;
use DataTables;

class KitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Kit::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function ($data) { 
                        $url= asset($data->img_kit);
                        return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
                     })
                     ->addColumn('descripcion', function ($data) { 
                        return $data->descripcion_kit;
                     })
                    ->editColumn('updated_at', function ($request) {
                        return $request->updated_at->format('Y-m-d'); 
                      })
                    ->addColumn('action', function($row){
                        
                        //$btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" class="ver btn btn-primary btn-sm">Descripcion</a>';
                        $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct">Editar</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Borrar</a>';
                        return $btn;
                    })
                    ->rawColumns(['image','action','descripcion'])
                    ->make(true);
        }
        return view('Admin.planes-beneficios.kits');
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
        //PARA CREAR
        if($request->create_edit==0){

            if ($request->file('img_kit')) {
                $imagePath = $request->file('img_kit');
                $imageName = time().'.'.$imagePath->getClientOriginalName();
                $imagePath->move(storage_path('app/public/kits'),$imageName);
            }

            $kit = new Kit();
            $kit->nombre_kit=$request->nombre_kit;
            $kit->descripcion_kit=$request->descripcion_kit;
            $kit->precio=$request->precio;
            //$kit->precio_suscripcion=$request->precio_suscripcion;
            $kit->img_kit='/storage/kits/'.$imageName;
            $kit->save();

        }

        //EDICION
        if($request->create_edit==1){

            $id=$request->kit_id;
            $id_paquete=$request->paquete_id;

            if ($request->file('img_kit')==null) {
                Kit::where('id',$id)->update(['nombre_kit' => $request->nombre_kit,
                                          'descripcion_kit'=>$request->descripcion_kit,
                                          'precio'=>$request->precio]);
            }
            else{

                //BORRAR IMAGEN 
                $archivos=Kit::where('id',$id)->get('img_kit');
                foreach($archivos as $archivo){
                    $route = explode("/", $archivo->img_kit);
                    Storage::delete('kits/'.$route[3]);
                }

                //SUBO IMAGEN AL STORAGE
                $imagePath = $request->file('img_kit');
                $imageName = time().'.'.$imagePath->getClientOriginalName();
                $imagePath->move(storage_path('app/public/kits'),$imageName);

                Kit::where('id',$id)->update(['nombre_kit' => $request->nombre_kit,
                                          'descripcion_kit'=>$request->descripcion_kit,
                                          'precio'=>$request->precio,
                                          'img_kit'=>'/storage/kits/'.$imageName]);

            }

        }

        return response()->json(['success'=>'Kit Guardado.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kit=Kit::find($id);
        return response()->json($kit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kit= Kit::find($id);
        return response()->json($kit);
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

        $archivos=Kit::where('id',$id)->get('img_kit');
        foreach($archivos as $archivo){
            $route = explode("/", $archivo->img_kit);
            Storage::delete('kits/'.$route[3]);
        }


        Kit::find($id)->delete();
        return response()->json(['success'=>'Kit Borrado Exitosamente!']);
    }


    public function listKits(){
        $kit=Kit::select('id','nombre_kit')->get();
        return response()->json(['kit'=>$kit]);
    }
}
