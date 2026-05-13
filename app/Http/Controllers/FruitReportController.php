<?php

namespace App\Http\Controllers;

use App\Models\fruit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class FruitReportController extends Controller
{
    public function index(Request $request)
    {
        $fruits = $this->filteredFruits($request)->get();
        $categories = fruit::query()
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('fruit-report', compact('fruits', 'categories'));
    }

    public function exportPdf(Request $request)
    {
        $fruits = $this->filteredFruits($request)->get();

        $pdf = Pdf::loadView('fruit-report-pdf', compact('fruits'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('fruit-report.pdf');
    }

    public function exportExcel(Request $request)
    {
        $fruits = $this->filteredFruits($request)->get();

        $html = view('fruit-report-excel', compact('fruits'))->render();

        return response($html, 200)
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="fruit-report.xls"');
    }

    private function filteredFruits(Request $request)
    {
        return fruit::query()
            ->when($request->category, function ($query, $category) {
                $query->where('category', $category);
            })
            ->when($request->availability, function ($query, $availability) {
                $query->where('is_available', $availability);
            })
            ->orderBy('fruit_name');
    }
}