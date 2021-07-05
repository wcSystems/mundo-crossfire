<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paquete;
use DataTables;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Paquete::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function ($data) { 
                        $url= asset($data->img_paquete);
                        return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
                     })
                    ->editColumn('updated_at', function ($request) {
                        return $request->updated_at->format('Y-m-d'); 
                      })
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" class="ver btn btn-primary btn-sm">Descripcion</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct">Editar</a>';
                        //$btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Borrar</a>';
                        return $btn;
                    })
                    ->rawColumns(['image','action'])
                    ->make(true);
        }

        $count=Paquete::count();

        return view('Admin.planes-beneficios.paquetes')->with('count',$count);
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

        //PARA CREAR
        if($request->create_edit==0){

            if ($request->file('img_paquete')) {
                $imagePath = $request->file('img_paquete');
                $imageName = time().'.'.$imagePath->getClientOriginalName();
                $imagePath->move(storage_path('app/public/paquetes'),$imageName);
            }

            $paquete = new Paquete();
            $paquete->nombre_paquete=$request->nombre_paquete;
            $paquete->descripcion_paquete=$request->descripcion_paquete;
            $paquete->precio_3=$request->precio_3;
            $paquete->precio_6=$request->precio_6;
            $paquete->precio_12=$request->precio_12;
            $paquete->img_paquete='/storage/paquetes/'.$imageName;
            $paquete->save();

        }else{

            $id=$request->paquete_id;

            if ($request->file('img_paquete')==null) {
                Paquete::where('id',$id)->update(['nombre_paquete' => $request->nombre_paquete,
                                          'descripcion_paquete'=>$request->descripcion_paquete,
                                          'precio_3'=>$request->precio_3,
                                          'precio_6'=>$request->precio_6,
                                          'precio_12'=>$request->precio_12]);
            }
            else{

                //BORRAR IMAGEN 
                $archivos=Paquete::where('id',$id)->get('img_paquete');
                foreach($archivos as $archivo){
                    $route = explode("/", $archivo->img_paquete);
                    Storage::delete('paquetes/'.$route[3]);
                }

                //SUBO IMAGEN AL STORAGE
                $imagePath = $request->file('img_paquete');
                $imageName = time().'.'.$imagePath->getClientOriginalName();
                $imagePath->move(storage_path('app/public/paquetes'),$imageName);

                Paquete::where('id',$id)->update(['nombre_paquete' => $request->nombre_paquete,
                                          'descripcion_paquete'=>$request->descripcion_paquete,
                                          'precio_3'=>$request->precio_3,
                                          'precio_6'=>$request->precio_6,
                                          'precio_12'=>$request->precio_12,
                                          'img_paquete'=>'/storage/paquetes/'.$imageName]);

            }

        }

        return response()->json(['success'=>'Paquete Guardado.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paquete=Paquete::find($id);
        return response()->json($paquete);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paquete= Paquete::find($id);
        return response()->json($paquete);
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

        $archivos=Paquete::where('id',$id)->get('img_paquete');
        foreach($archivos as $archivo){
            $route = explode("/", $archivo->img_paquete);
            Storage::delete('paquetes/'.$route[3]);
        }

        Paquete::find($id)->delete();
     
        return response()->json(['success'=>'Paquete Borrado Exitosamente!']);
    }

    public function list_Paquete(){


        $paquete=Paquete::select('id','nombre_paquete')->get();
        return response()->json(['paquete'=>$paquete]);

    }
}
