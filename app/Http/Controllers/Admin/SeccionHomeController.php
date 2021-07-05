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
                        $url= asset($data->img);
                        return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
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

            if ($request->file('img_seccion')) {
                $imagePath = $request->file('img_seccion');
                $imageName = time().'.'.$imagePath->getClientOriginalName();
                $imagePath->move(storage_path('app/public/seccion'),$imageName);
            }

            $seccion = new Seccion();
            $seccion->link=$request->link;
            $seccion->texto=$request->descripcion_seccion;
            $seccion->img='/storage/seccion/'.$imageName;
            $seccion->save();

        }

        //EDICION
        if($request->create_edit==1){

            $id=$request->seccion_id;

            if ($request->file('img_seccion')==null) {
                Seccion::where('id',$id)->update(['link' => $request->link,
                'texto'=>$request->descripcion_seccion]);
            }
            else{

                //BORRAR IMAGEN 
                $archivos=Seccion::where('id',$id)->get('img');
                foreach($archivos as $archivo){
                    $route = explode("/", $archivo->img);
                    Storage::delete('seccion/'.$route[3]);
                }

                //SUBO IMAGEN AL STORAGE
                $imagePath = $request->file('img_seccion');
                $imageName = time().'.'.$imagePath->getClientOriginalName();
                $imagePath->move(storage_path('app/public/seccion'),$imageName);

                Seccion::where('id',$id)->update(['link' => $request->link,
                                          'texto'=>$request->descripcion_seccion,
                                          'img'=>'/storage/seccion/'.$imageName]);

            }

        }

        return response()->json(['success'=>'Seccion Guardado.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seccion= Seccion::find($id);
        return response()->json($seccion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seccion= Seccion::find($id);
        return response()->json($seccion);
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
        $archivos=Seccion::where('id',$id)->get('img');
        foreach($archivos as $archivo){
            $route = explode("/", $archivo->img);
            Storage::delete('seccion/'.$route[3]);
        }

        Seccion::find($id)->delete();
        return response()->json(['success'=>'Seccion Borrado Exitosamente!']);
    }
}
