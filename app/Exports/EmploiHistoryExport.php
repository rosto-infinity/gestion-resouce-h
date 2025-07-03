<?php

namespace App\Exports;

use App\Models\EmploiHistory;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;

class EmploiHistoryExport implements FromView, WithStyles
{
    public function view(): View
    {
        $emploisHistories = EmploiHistory::with(['user:id,name', 'emploi:id,emploi_title'])->get();

        return view('admin.emplois_histories.excel', [
            'emploisHistories' => $emploisHistories
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        // Style des en-têtes (ligne 1)
        $sheet->getStyle('A1:E1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 12,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => '4CAF50'], // Vert professionnel
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        // Style des cellules de données
        $sheet->getStyle('A2:E' . ($sheet->getHighestRow()))
            ->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['rgb' => 'DDDDDD'],
                    ],
                ],
            ]);

        // Ajustement automatique de la largeur des colonnes
        foreach (range('A', 'E') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Couleur alternée des lignes pour améliorer la lisibilité
        $sheet->getStyle('A2:E' . ($sheet->getHighestRow()))
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFFFFF'); // Couleur de fond par défaut (blanc)

        // Lignes paires en gris clair
        for ($i = 2; $i <= $sheet->getHighestRow(); $i++) {
            if ($i % 2 == 0) {
                $sheet->getStyle("A{$i}:E{$i}")
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('F5F5F5');
            }
        }
    }
}
