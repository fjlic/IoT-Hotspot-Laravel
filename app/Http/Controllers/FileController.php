<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use PhpParser\Node\Stmt\Foreach_;

class FileController extends Controller
{
    /**
     * Create a new controller instance.
     * Part Name : CNT
     * Part Size : 15.1
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $files = File::all();
        //$total_line = 0;
        //if($files->isNotEmpty()){
         // foreach ($files as $key => $file) {
          //    $total_line += $file->set;
         // }
        //}
       
        return view('module.file.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('module.file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name_file'=>'required|file',
            //'set'=>'required|string|max:100',
            //'route'=>'required|string|max:100',
        ]);
        $req_file = $request->file('name_file');
        $set = $request->get('set');

        //CARGO EL ARCHIVO QUE DESEO LEER
        $archivo=fopen($req_file, "r") or die ("error al leer el archivo");
        //INICIALIZO LA VARIABLE QUE ME ALMACENARA LAS LINEAS
        //$set = 0; 
        //$linea_vacia="";
        //HAGO UNA SENTENCIA QUE ME RECORRA EL ARCHIVO  DE INICIO A FIN 
        //while (!feof($archivo)) {
        //  if ($cant_lineas=fgets($archivo)) {
            //HAGO UN CONTADOR QUE ME ALMACENE LA CANTIDAD DE LINEAS DE CODIGO
        //    $set++;
        //  }

        //  else if($cant_lineas=NULL) {
        ///    $set = 0;
        //   }

        //} 
        //fclose ($archivo);

        $name_file = $req_file->getClientOriginalName();
        $path_file = public_path("storage/public/files") . "/" . $name_file;

        $file = new File([
            'name_file' => $name_file,
            'set' => $set,
            'route' => $path_file,
            ]);

        $file->save();
        $req_file->move(public_path("storage/public/files"),$name_file);
        //return redirect(/file)->with('success','File creado');
        toastr()->success('File creado');
        return redirect()->route('file.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
        return view('module.file.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
        return view('module.file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
        $request->validate([
            'name_file'=>'required|string',
            'set'=>'required|string',
            'route'=>'required|string',
        ]);
        $file_request = $request->all();
        $file->update($file_request);
        toastr()->warning('File actualizada');
        return redirect()->route('file.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
        unlink($file->route);
        $file->delete();
        //return reditec('/file'->with('success','File eliminado'));
        toastr()->error('File eliminado');
        return redirect()->route('file.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request,$id)
    {
        $file = File::where('id',$id)->first();
        if (is_null($file)) {
            return response()->json(['message' => 'Archivo no encontrado'], 404);
        }
        $fileName = $file->name_file;
        $filePath = $file->route;
        if (Storage::exists('public/files/'.$file->name_file)) {
            $pathToFile = public_path("storage/public/files/").$file->name_file;
            $headers = [
                'Content-Type' => 'application/octet-stream',
            ];
            // return Storage::download($pathToFile, $fileName, $headers);
            return response()->download($pathToFile, $fileName, $headers);
            // return response()->json(['message' => $filePath], 200);
        }
        /*else{
            return response()->json(['message' => 'Archivo no encontrado'], 404);
        }*/
    }
    
}
