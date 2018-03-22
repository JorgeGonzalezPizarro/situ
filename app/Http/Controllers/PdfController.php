<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Date;
class PdfController extends Controller
{
    public function cv()
    {
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "Portolio profesional de ";
        $view =  \View::make('pdf.cv', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function getData()
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }
}
