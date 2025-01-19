<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class PdfController extends Controller
{
    public function generatePDF()
    {
        $products = Products::get();
        $pdf = FacadePdf::loadView('products-pdf', ['products' => $products]);
       
        return $pdf->download('products.pdf');
    }

}
