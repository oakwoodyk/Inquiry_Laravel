<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    public function show(Request $request)
    {
        $min = $request->min;
        $max = $request->max;
        $items = DB::table('people')->whereRaw('age >= ? and age <= ?', [$min, $max])->get();
        return view('show', ['items' => $items]);
    }
    public function index(Request $request)
    {
        $items = DB::table('people')->orderBy('age', 'asc')->get();
        return view('index', ['items' => $items]);
    }
}