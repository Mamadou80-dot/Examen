<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function downloadClientPDF()
    {
        // Exemple : $fileName = 'clients_report.pdf';
        // Assurez-vous que le fichier existe dans le système de fichiers.
        $filePath = public_path('files/clients_report.pdf');
        return response()->download($filePath);
    }

    public function downloadProductExcel()
    {
        // Exemple : $fileName = 'products_report.xlsx';
        // Assurez-vous que le fichier existe dans le système de fichiers.
        $filePath = public_path('files/products_report.xlsx');
        return response()->download($filePath);
    }
}
