<?php
namespace DwarfPirate\TcPdf\Utility;

/**
 * Class ExtendedTcPdf
 * @package DwarfPirate\TcPdf
 */
class ExtendedTcPdf {

	/**
	 * init library
	 */
	protected function initLibrary() {
		if(!class_exists('TCPDF', FALSE)) {
			require_once(FLOW_PATH_PACKAGES . 'Libraries/tcpdf/tcpdf.php');
			require_once(FLOW_PATH_PACKAGES . 'Libraries/tcpdf/ExtendedTcPdf.php');
		}
	}

	/**
	 * @return \ExtendedTcPdf
	 */
	public function createStandardPdf($backgroundImage) {
		$this->initLibrary();
		$pdf = new \ExtendedTcPdf('P', 'mm', 'A4', true, 'UTF-8', false);
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
	 * @param int $topMargin
	 * @param int $pageBreak
	 * @return \ExtendedTcPdf
	 */
	public function createReportPdf($backgroundImage, $topMargin = 50, $pageBreak = 40) {
		$this->initLibrary();
		$pdf = new \ExtendedTcPdf('P', 'mm', 'A4', true, 'UTF-8', false);
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