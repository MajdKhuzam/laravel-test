<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
// use Dompdf\Dompdf;

class PdfController extends Controller
{
    public function generatePDF()
    {
        $products = Products::get();
        $pdf = Pdf::loadView('products-pdf', ['products' => $products]);
        return $pdf->download('products.pdf');

        // return view('products-pdf', ['products' => $products]);
    }

}
