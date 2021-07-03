<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Productos_Foto;
use App\Models\Categoria;
use App\Models\Subcategorias_Producto;
use App\Models\Categoria_Producto;

use DataTables;
use Illuminate\Support\Str;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if ($request->ajax()) {

            /*$data = Producto::join('categorias', 'productos.categoria_id', '=', 'categorias.id')
            ->select(\DB::raw('IF(productos.indicador_promocion=0,"No","Si") as promo, indicador_promocion'),\DB::raw('IF(productos.destacado=0,"No","Si") as desta, destacado'),
                    'titulo','cantidad','precio_no_afiliados','precio_afiliados','precio_promocion','nombre_categoria','productos.id','visible','precio_envio')
            ->latest('productos.id')->get();*/
            
           /*  $data = Producto::join('categorias', 'productos.categoria_id', '=', 'categorias.id')
                    ->select(\DB::raw('IF(productos.indicador_promocion=0,"No","Si") as promo, indicador_promocion'),\DB::raw('IF(productos.destacado=0,"No","Si") as desta, destacado'),
                            'titulo','cantidad','precio_no_afiliados','precio_afiliados','precio_promocion','nombre_categoria','productos.id','visible','precio_envio','ordenados')
                    ->orderByRaw('-ordenados', 'DESC')->get(); */


            /* $data = Producto::select(\DB::raw('IF(productos.indicador_promocion=0,"No","Si") as promo, indicador_promocion'),\DB::raw('IF(productos.destacado=0,"No","Si") as desta, destacado'),
                   'titulo','cantidad','precio_no_afiliados','precio_afiliados','precio_promocion','id','visible','precio_envio','ordenados')
                   ->orderByRaw('-ordenados', 'DESC')->get(); */
                
                   $data = Producto::all();


            $data = $data->reverse();

            return Datatables::of($data)->make();
            
        }

        $categories=Categoria::get();

        return view('Admin.productos')->with('categories',$categories);
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
        if($request->precio_promocion==''){
            $precio_promocion=0;
        }else{
            $precio_promocion=$request->precio_promocion;
        }

        /*if($request->precio_despacho==''){
            $precio_despacho=0;
        }else{
            $precio_despacho=$request->precio_despacho;
        }*/
        $nro = random_int(0, 20);
        if(Producto::where('slug',Str::slug($request->titulo, '-'))->exists() ){
            $slug = $request->titulo.'-1'.$nro;
        }else{
            $slug = $request->titulo;
        }

        $produ=Producto::updateOrCreate(['id' => $request->producto_id],
                 [
                    'titulo' =>$request->titulo,
                    'descripcion' => $request->descripcion,
                    'cantidad' => $request->cantidad,
                    'precio_no_afiliados' => $request->precio_no_afiliados,
                    'precio_afiliados' => $request->precio_afiliados,
                    'precio_promocion' => $precio_promocion,
                    'indicador_promocion' => $request->indicador_promocion,
                    'img_principal'=>'',
                    'destacado'=>$request->destacado,
                    'visible'=>$request->visible,
                    'precio_envio'=>$request->precio_envio,
                    'ordenados'=>$request->ordenados,
                    'slug'=> Str::slug($slug, '-')
                 ]);
                 //'precio_despacho'=>$precio_despacho]);   

        $subcate=$request->subcategoria;
        $idprod=$produ->id;
        $create_edit=$request->create_edit2;

        if (!empty($subcate)) {
            if($create_edit==0){
            //CREAR
                for($j=0; $j < (count($request->input('subcategoria'))) ;$j++){
                    $subcategorias_pro = new Subcategorias_Producto();
                    $subcategorias_pro->producto_id=$idprod;
                    $subcategorias_pro->subcategoria_id=$request->input('subcategoria.'.$j);
                    $subcategorias_pro->save(); 
                }

                for($i=0; $i < (count($request->input('categoria'))) ;$i++){
                    $subcategorias_pro = new Categoria_Producto();
                    $subcategorias_pro->producto_id=$idprod;
                    $subcategorias_pro->categoria_id=$request->input('categoria.'.$i);
                    $subcategorias_pro->save(); 
                }
            }
            
        }

        if($create_edit==1){
            if(is_null($subcate)){
                Subcategorias_Producto::where('producto_id',$idprod)->delete();
            }else{
                Subcategorias_Producto::where('producto_id',$idprod)->delete();

                for($j=0; $j < (count($request->input('subcategoria'))) ;$j++){
                    $subcategorias_pro = new Subcategorias_Producto();
                    $subcategorias_pro->producto_id=$idprod;
                    $subcategorias_pro->subcategoria_id=$request->input('subcategoria.'.$j);
                    $subcategorias_pro->save(); 
                }

            }


            Categoria_Producto::where('producto_id',$idprod)->delete();
            for($i=0; $i < (count($request->input('categoria'))) ;$i++){
                $subcategorias_pro = new Categoria_Producto();
                $subcategorias_pro->producto_id=$idprod;
                $subcategorias_pro->categoria_id=$request->input('categoria.'.$i);
                $subcategorias_pro->save(); 
            }
            
            
        }

        

        return response()->json(['success'=>'Exitoso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto=Producto::select(\DB::raw('IF(productos.indicador_promocion=0,"No","Si") as promo, indicador_promocion'),
                            'titulo','cantidad','precio_no_afiliados','precio_afiliados','precio_promocion','productos.id','descripcion','visible')
                    ->where('productos.id',$id)->first();

                   
        $categorias=Categoria::join('categorias_productos','categorias.id','=','categorias_productos.categoria_id')
                    ->where('categorias_productos.producto_id',$id)->select('nombre_categoria')->get();

        $nombre=array();

        foreach($categorias as $filax) {
                array_push($nombre, $filax->nombre_categoria);
        }
            
        $category=implode(", ", $nombre);
        
    
        return response()->json(['producto'=>$producto, 'categoria' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto= Producto::find($id);
        return response()->json($producto);
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

        $archivos=Productos_Foto::where('producto_id',$id)->get('img');
            
        foreach($archivos as $archivo){
            $route = explode("/", $archivo->img);
            Storage::disk('public')->delete('productos/'.$route[3]);
        }

    
        $pro = Producto::find($id);
        $pro->ordenados=null;
        $pro->save();

        Producto::find($id)->delete();
        
        return response()->json(['success'=>'Producto Borrado Exitosamente!']);
    }


    public function saveImages(Request $request){
        $id_producto=Producto::latest('created_at')->first('id');

        //PARA CREAR
        if($request->create_edit==0){

            if($request->file('imagen')==null){
                goto salir_crear;
            }

            foreach ($request->file('imagen') as $key => $value) {
            
                $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
                Storage::disk('public')->put('productos/'.$imageName,  \File::get($value));
           
                $productos_foto = new Productos_Foto();
                $productos_foto->producto_id=$id_producto->id;
                $productos_foto->img='/storage/productos/'.$imageName;
                $productos_foto->save();
    
            }

            $first_photo=Productos_Foto::where('producto_id',$id_producto->id)->first('img');
            Producto::where('id',$id_producto->id)->update(['img_principal' => $first_photo->img]);

        }

    salir_crear:

        //PARA EDITAR
        if($request->create_edit==1){

            if($request->file('imagen')!=null){
            
                // Borra en el storage y el producto
                $archivos=Productos_Foto::where('producto_id',$request->valor_producto)->get('img');
                
                foreach($archivos as $archivo){
                    $route = explode("/", $archivo->img);
                    Storage::disk('public')->delete('productos/'.$route[3]);
                }

                Productos_Foto::where('producto_id',$request->valor_producto)->delete();


                // Crea el producto y almacena el storage
                foreach ($request->file('imagen') as $key => $value) {
                
                    $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
                    Storage::disk('public')->put('productos/'.$imageName,  \File::get($value));
            
                    $productos_foto = new Productos_Foto();
                    $productos_foto->producto_id=$request->valor_producto;
                    $productos_foto->img='/storage/productos/'.$imageName;
                    $productos_foto->save();
        
                }


                $first_photo=Productos_Foto::where('producto_id',$request->valor_producto)->first('img');
                Producto::where('id',$request->valor_producto)->update(['img_principal' => $first_photo->img]);
            }
            
        }
        
        return redirect()->route('productos.index');
        
    }

    public function validateOrder(){

        $p=Producto::get('ordenados');
        $veinte=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];

        foreach($p as $or){
			$px[] = $or->ordenados;
		}
        $final=array_diff($veinte, $px);
    
        return response()->json(['final'=>$final]);
    }
}
