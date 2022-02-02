<?php

namespace App\Http\Controllers;

use App\Models\ClassName;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ClassNameController extends Controller
{
    /**
     * Create a new controller instance.
     * Part Name : CNT
     * * Part Size : 15.1
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
        // (ClassName)'id', 'class_name', 'class_loc', 'num_method',
        
        $classnames = ClassName::all();
        $total_in = 0;
        $total_in2 = 0;
        $avg = 0;
        $var = 0;
        $tam = 0;
        $in_vs = 0;
        $in_s = 0;
        $in_m = 0;
        $in_l = 0;
        $in_vl = 0;
        foreach ($classnames as $key => $classname) {
            $classname->loc_method = ($classname->class_loc/$classname->num_method);
            $classname->in = log($classname->loc_method);
            $total_in += $classname->in;
            $tam++;
        }
        $avg = ($total_in / $tam);
        foreach ($classnames as $key => $classname) {
            $classname->in2 = (($classname->in-$avg)*($classname->in-$avg));
            $total_in2 += $classname->in2;
        }
        $var = ($total_in2 / ($tam-1));
        $var_o = sqrt($var);
        $in_vs = ($avg - ($var_o + $var_o));
        $in_s = ($avg - $var_o);
        $in_m = $avg;
        $in_l = ($avg + $var_o);
        $in_vl = $avg + ($var_o + $var_o);
        $loc_1 = exp($in_vs);
        $loc_2 = exp($in_s);
        $loc_3 = exp($in_m);
        $loc_4 = exp($in_l);
        $loc_5 = exp($in_vl);
        //////////////////////////////////////////////////////////////////////////////////
        // (Chapter)'id', 'chapter', 'pages',
        $chapters = Chapter::all();
        $pag_total_in = 0;
        $pag_total_in2 = 0;
        $pag_avg = 0;
        $pag_var = 0;
        $pag_tam = 0;
        $pag_in_vs = 0;
        $pag_in_s = 0;
        $pag_in_m = 0;
        $pag_in_l = 0;
        $pag_in_vl = 0;
        foreach ($chapters as $key => $chapter) {
            $chapter->in = log($chapter->pages);
            $pag_total_in += $chapter->in;
            $pag_tam++;
        }
        $pag_avg = ($pag_total_in / $pag_tam);
        foreach ($chapters as $key => $chapter) {
            $chapter->in2 = (($chapter->in-$pag_avg)*($chapter->in-$pag_avg));
            $pag_total_in2 += $chapter->in2;
        }
        $pag_var = ($pag_total_in2 / ($pag_tam-1));
        $pag_var_o = sqrt($pag_var);
        $pag_in_vs = ($pag_avg - ($pag_var_o + $pag_var_o));
        $pag_in_s = ($pag_avg - $pag_var_o);
        $pag_in_m = $pag_avg;
        $pag_in_l = ($pag_avg + $pag_var_o);
        $pag_in_vl = $pag_avg + ($pag_var_o + $pag_var_o);
        $pag_1 = exp($pag_in_vs);
        $pag_2 = exp($pag_in_s);
        $pag_3 = exp($pag_in_m);
        $pag_4 = exp($pag_in_l);
        $pag_5 = exp($pag_in_vl);
        //////////////////////////////////////////////////////////////////////////////////
        return view('module.classname.index',compact('classnames','chapters','total_in','total_in2',
                                                     'loc_1','loc_2','loc_3','loc_4','loc_5',
                                                     'pag_1','pag_2','pag_3','pag_4','pag_5'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('module.classname.create');
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
            'class_name'=>'required|string|max:100',
            'class_loc'=>'required|string|max:100',
            'num_method'=>'required|string|max:100',
        ]);
        $classname = new ClassName([
            'class_name' => $request->get('class_name'),
            'class_loc' => $request->get('class_loc'),
            'num_method' => $request->get('num_method')
            ]);
        $classname->save();
        //return redirect(/classname)->with('success','ClassName creada');
        toastr()->success('ClassName creada');
        return redirect()->route('classname.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassName  $className
     * @return \Illuminate\Http\Response
     */
    public function show(ClassName $classname)
    {
        //
        return view('module.classname.show', compact('classname'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassName  $className
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassName $classname)
    {
        //
        return view('module.classname.edit',compact('classname'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassName  $className
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassName $classname)
    {
        //
        $request->validate([
            'class_name'=>'required|string|max:100',
            'class_loc'=>'required|string|max:100',
            'num_method'=>'required|string|max:100',
        ]);
        $classname_request = $request->all();
        $classname->update($classname_request);
        toastr()->warning('ClassName actualizada');
        return redirect()->route('classname.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassName  $className
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassName $classname)
    {
        //
        $classname->delete();
        //return reditec('/classname'->with('success','Class eliminado'));
        toastr()->error('ClassName eliminado');
        return redirect()->route('classname.index');
       
    }
}
