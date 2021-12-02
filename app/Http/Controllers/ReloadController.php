<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class ReloadController extends Controller
{
    public function __invoke(){

        $user = auth()->user();

        $pdf = PDF::loadView('resume-ref', compact('user'));
        return $pdf->stream('resume-ref.pdf');

    }
}
