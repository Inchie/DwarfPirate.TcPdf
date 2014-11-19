<?php
namespace DwarfPirate\TcPdf\Utility;

/**
 * Class ExtendedTcPdf
 * @package DwarfPirate\TcPdf
 */
class ExtendedTcPdf {

	/**
	 * @return \DwarfPirate\TcPdf\ExtendedTcPdf
	 * ToDo read settings form configuration so that different pdfs can be use
	 */
	public function createStandardPdf($backgroundImage) {
		//$className = $packageKey . '\TcPdf\ExtendedTcPdf';
		$pdf = new \DwarfPirate\TcPdf\ExtendedTcPdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->setBackgroundImage($backgroundImage);
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->SetMargins(25, 50, 20);
		$pdf->SetAutoPageBreak(TRUE, 40);
		$pdf->setPrintFooter(false);
		$pdf->AddImagePage();
		return $pdf;
	}

	/**
	 * @param $backgroundImage
	 * @return \DwarfPirate\TcPdf\LandscapeExtendedTcPdf
	 */
	public function createLandscapePdf($backgroundImage) {
		$pdf = new \DwarfPirate\TcPdf\LandscapeExtendedTcPdf('L', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->setBackgroundImage($backgroundImage);
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetAutoPageBreak(TRUE, 20);
		$pdf->setPrintFooter(false);
		$pdf->AddImagePage();
		return $pdf;
	}

	/**
	 * @param $backgroundImage
	 * @param int $topMargin
	 * @param int $pageBreak
	 * @return \DwarfPirate\TcPdf\ExtendedTcPdf
	 */
	public function createReportPdf($backgroundImage, $topMargin = 50, $pageBreak = 40) {
		$pdf = new \DwarfPirate\TcPdf\ExtendedTcPdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->setBackgroundImage($backgroundImage);
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->SetMargins(PDF_MARGIN_LEFT, $topMargin, 20);
		$pdf->SetAutoPageBreak(TRUE, $pageBreak);
		$pdf->setPrintFooter(true);
		$pdf->AddImagePage();
		return $pdf;
	}


}
?>