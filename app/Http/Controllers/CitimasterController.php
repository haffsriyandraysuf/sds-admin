<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rdct_fundname;

class CitimasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rdct_fundnames = Rdct_fundname::all();
        return view('reksadana.mastertemplate.master', compact('rdct_fundnames'));
    }
}
