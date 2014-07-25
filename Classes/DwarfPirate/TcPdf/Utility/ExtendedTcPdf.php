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
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setPrintFooter(false);
		$pdf->AddPage();
		$pdf->setBackgroundImage($backgroundImage);
		return $pdf;
	}


}
?>