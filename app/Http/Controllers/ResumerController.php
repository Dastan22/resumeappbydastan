<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class ResumerController extends Controller
{
    public function __invoke(){
        $user = auth()->user();
        return view('resume-ref', compact('user'));
    }

    public function download(){

        $user = auth()->user();

        $pdf = PDF::loadView('resume-ref', compact('user'));
        return $pdf->download('resume-ref.pdf');

    }

}
