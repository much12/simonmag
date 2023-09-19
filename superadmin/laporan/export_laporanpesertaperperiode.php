<?php
require_once '../../composer/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('L', 'A4', 'en');

ob_start();
include 'content_laporanpesertaperperiode.php';
$content = ob_get_clean();

$html2pdf->writeHTML($content);
$html2pdf->output('Laporan Peserta Per Periode.pdf');
