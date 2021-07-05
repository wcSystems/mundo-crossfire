<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marcas;
use DataTables;


class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Marcas::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function ($data) { 
                        $url= asset($data->img_marcas);
                        return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
                     })
                    ->editColumn('img_marcas', function ($request) {
                        return substr($request->img_marcas,27); 
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
        
        return view('Admin.marcas');
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
        // PARA CREAR
        if($request->create_edit==0){

            $image = $request->file('file');
            $imageName = time().'.'.$image->getClientOriginalName();
            $image->move(storage_path('app/public/marcas'),$imageName);

            $marcas = new Marcas();
            $marcas->img_marcas='/storage/marcas/'.$imageName;
            $marcas->save();

        }

        //PARA EDITAR
        if($request->create_edit==1){
            //BORRO LA IMAGEN
            $archivos=Marcas::where('id',$request->marcas_id)->get('img_marcas');

            foreach($archivos as $archivo){
                $route = explode("/", $archivo->img_marcas);
                Storage::delete('marcas/'.$route[3]);
            }

            $image = $request->file('file');
            $imageName = time().'.'.$image->getClientOriginalName();
            $image->move(storage_path('app/public/marcas'),$imageName);

            Marcas::where('id',$request->marcas_id)->update(['img_marcas' => '/storage/marcas/'.$imageName]);


        }

        return response()->json(['success'=>'Marca Guardado.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marcas=Marcas::where('id',$id)->first();

        return response()->json($marcas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marcas= Marcas::find($id);
        return response()->json($marcas);
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
        $archivos=Marcas::where('id',$id)->get('img_marcas');

        foreach($archivos as $archivo){
            $route = explode("/", $archivo->img_marcas);
            Storage::delete('marcas/'.$route[3]);
        }
        
        Marcas::find($id)->delete();

        return response()->json(['success'=>'Marcas Borrado Exitosamente!']);
    }
}
