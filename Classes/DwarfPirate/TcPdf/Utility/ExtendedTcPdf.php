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
	public function createPdf() {
		$this->initLibrary();
		$pdf = new \ExtendedTcPdf('P', 'mm', 'A4', true, 'UTF-8', false);
		return $pdf;
	}
}
?>