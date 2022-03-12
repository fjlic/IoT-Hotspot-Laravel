<?php

namespace App\Http\Controllers;

use App\Models\ProbeEstimating;
use Illuminate\Http\Request;

class ProbeEstimatingController extends Controller
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
        // 'id', 'prox_size', 'mod_size', 'stm_prox_size', 'act_dev_size',
        // Test 1 proxy size and actual added  
        $x = 0;
        $y = 0;
        $x2 = 0;
        $y2 = 0;
        $xy = 0;
        $tm = 0;
        $b11 = 0;
        $r11 = 0;
        $r12 = 0;
        $b10 = 0;
        $y1 = 0;
        $probeestimatings = ProbeEstimating::all();
        foreach ($probeestimatings as $key => $probeestimating) {
            $tm++;
            $x += $probeestimating->prox_size;
            $y += $probeestimating->stm_prox_size;
            $x2 += ($probeestimating->prox_size * $probeestimating->prox_size);
            $y2 += ($probeestimating->stm_prox_size * $probeestimating->stm_prox_size);
            $xy += ($probeestimating->prox_size * $probeestimating->stm_prox_size);
        }
        $x_med = ($x/$tm);
        $y_med = ($y/$tm);
        $b11 = ($xy - (($tm)*($x_med)*($y_med))) / (($x2)-(($tm)*(($x_med)*($x_med))));
        $r11 = (($tm*$xy) - (($x)*($y))) / sqrt((($tm*$x2)-($x)*($x)) * (($tm*$y2)-(($y)*($y))));
        $r12 = ($r11*$r11);
        $b10 = ($y_med-($b11*$x_med));
        $y1 = ($b10+($b11*386));

        // Test 2 proxy size and actual development 
        $x = 0;
        $y = 0;
        $x2 = 0;
        $y2 = 0;
        $xy = 0;
        $tm = 0;
        $b21 = 0;
        $r21 = 0;
        $r22 = 0;
        $b20 = 0;
        $y22 = 0;

        $probeestimatings = ProbeEstimating::all();
        foreach ($probeestimatings as $key => $probeestimating) {
            $tm++;
            $x += $probeestimating->prox_size;
            $y += $probeestimating->act_dev_size;
            $x2 += ($probeestimating->prox_size * $probeestimating->prox_size);
            $y2 += ($probeestimating->act_dev_size * $probeestimating->act_dev_size);
            $xy += ($probeestimating->prox_size * $probeestimating->act_dev_size);
        }
        $x_med = ($x/$tm);
        $y_med = ($y/$tm);
        $b21 = ($xy - (($tm)*($x_med)*($y_med))) / (($x2)-(($tm)*(($x_med)*($x_med))));
        $r21 = (($tm*$xy) - (($x)*($y))) / sqrt((($tm*$x2)-($x)*($x)) * (($tm*$y2)-(($y)*($y))));
        $r22 = ($r21*$r21);
        $b20 = ($y_med-($b21*$x_med));
        $y22 = ($b20+($b21*386));

        // Test 3 proxy size and actual development 
        $x = 0;
        $y = 0;
        $x2 = 0;
        $y2 = 0;
        $xy = 0;
        $tm = 0;
        $b31 = 0;
        $r31 = 0;
        $r32 = 0;
        $b30 = 0;
        $y3 = 0;

        $probeestimatings = ProbeEstimating::all();
        foreach ($probeestimatings as $key => $probeestimating) {
            $tm++;
            $x += $probeestimating->mod_size;
            $y += $probeestimating->stm_prox_size;
            $x2 += ($probeestimating->mod_size * $probeestimating->mod_size);
            $y2 += ($probeestimating->stm_prox_size * $probeestimating->stm_prox_size);
            $xy += ($probeestimating->mod_size * $probeestimating->stm_prox_size);
        }
        $x_med = ($x/$tm);
        $y_med = ($y/$tm);
        $b31 = ($xy - (($tm)*($x_med)*($y_med))) / (($x2)-(($tm)*(($x_med)*($x_med))));
        $r31 = (($tm*$xy) - (($x)*($y))) / sqrt((($tm*$x2)-($x)*($x)) * (($tm*$y2)-(($y)*($y))));
        $r32 = ($r31*$r31);
        $b30 = ($y_med-($b31*$x_med));
        $y3 = ($b30+($b31*386));

        // Test 4 proxy size and actual development 
        $x = 0;
        $y = 0;
        $x2 = 0;
        $y2 = 0;
        $xy = 0;
        $tm = 0;
        $b41 = 0;
        $r41 = 0;
        $r42 = 0;
        $b40 = 0;
        $y4 = 0;

        $probeestimatings = ProbeEstimating::all();
        foreach ($probeestimatings as $key => $probeestimating) {
            $tm++;
            $x += $probeestimating->mod_size;
            $y += $probeestimating->act_dev_size;
            $x2 += ($probeestimating->mod_size * $probeestimating->mod_size);
            $y2 += ($probeestimating->act_dev_size * $probeestimating->act_dev_size);
            $xy += ($probeestimating->mod_size * $probeestimating->act_dev_size);
        }
        $x_med = ($x/$tm);
        $y_med = ($y/$tm);
        $b41 = ($xy - (($tm)*($x_med)*($y_med))) / (($x2)-(($tm)*(($x_med)*($x_med))));
        $r41 = (($tm*$xy) - (($x)*($y))) / sqrt((($tm*$x2)-($x)*($x)) * (($tm*$y2)-(($y)*($y))));
        $r42 = ($r41*$r41);
        $b40 = ($y_med-($b41*$x_med));
        $y4 = ($b40+($b41*386));

        //return view('modules.probeestimating.index')->with('probeestimatings');
        return view('modules.probeestimating.index',compact('probeestimatings','b11','r11','r12','b10','y1',
                                                                              'b21','r21','r22','b20','y22',
                                                                              'b31','r31','r32','b30','y3',
                                                                              'b41','r41','r42','b40','y4'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('modules.probeestimating.create');
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
            'prox_size'=>'required|string|max:100',
            'mod_size'=>'required|string|max:100',
            'stm_prox_size'=>'required|string|max:100',
            'act_dev_size'=>'required|string|max:100',
        ]);
        $statistical = new ProbeEstimating([
            'prox_size' => $request->get('prox_size'),
            'mod_size' => $request->get('mod_size'),
            'stm_prox_size' => $request->get('stm_prox_size'),
            'act_dev_size' => $request->get('act_dev_size')
            ]);
        $statistical->save();
        //return redirect(/probeestimating)->with('success','Datos probe creados');
        toastr()->success('Datos probe creados');
        return redirect()->route('probeestimating.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProbeEstimating  $probeEstimating
     * @return \Illuminate\Http\Response
     */
    public function show(ProbeEstimating $probeestimating)
    {
        //
        return view('modules.probeestimating.show', compact('probeestimating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProbeEstimating  $probeEstimating
     * @return \Illuminate\Http\Response
     */
    public function edit(ProbeEstimating $probeestimating)
    {
        //
        return view('modules.probeestimating.edit',compact('probeestimating'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProbeEstimating  $probeEstimating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProbeEstimating $probeestimating)
    { 
        //
        $request->validate([
            'prox_size'=>'required|string|max:100',
            'mod_size'=>'required|string|max:100',
            'stm_prox_size'=>'required|string|max:100',
            'act_dev_size'=>'required|string|max:100',
        ]);
        $probeestimating_request = $request->all();
        $probeestimating->update($probeestimating_request);
        toastr()->warning('Datos probe actualizados');
        return redirect()->route('probeestimating.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProbeEstimating  $probeEstimating
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProbeEstimating $probeestimating)
    {
        //
        $probeestimating->delete();
        //return reditec('/probeestimating'->with('success','Datos probe eliminado'));
        toastr()->error('Datos probe eliminado');
        return redirect()->route('probeestimating.index');
    }
}
