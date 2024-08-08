<?php
require_once '../classes/Database.php';
require_once '../classes/Appartement.php';

$db = new Database();
$conn = $db->connect();

$appartement = new Appartement($conn);
$result = $appartement->obtenirTous();

require_once '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Appartement');
$sheet->setCellValue('B1', 'Femme de ménage');
$sheet->setCellValue('C1', 'Ménagé');
$sheet->setCellValue('D1', 'Type de ménage');
$sheet->setCellValue('E1', 'Date du ménage');
$sheet->setCellValue('F1', 'Prochaine date');
$sheet->setCellValue('G1', 'Commentaires');

$row = 2;
while ($app = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $row, $app['nom']);
    $sheet->setCellValue('B' . $row, $app['nom_femme_de_menage']);
    $sheet->setCellValue('C' . $row, $app['menage'] ? 'Oui' : 'Non');
    $sheet->setCellValue('D' . $row, $app['type_menage']);
    $sheet->setCellValue('E' . $row, $app['date_menage']);
    $sheet->setCellValue('F' . $row, $app['prochaine_date_menage']);
    $sheet->setCellValue('G' . $row, $app['commentaires']);
    $row++;
}

$writer = new Xlsx($spreadsheet);
$filename = 'rapport_menage.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
?>
