<?php
namespace DwarfPirate\TcPdf;

/**
 * Class ExtendedTcPdf
 * @package DwarfPirate\TcPdf
 */
class ExtendedTcPdf {

	/**
	 * constructor
	 */
	public function __contruct() {
		$this->initLibrary();
	}

	/**
	 *
	 */
	protected function initLibrary() {
		if(!class_exists('TCPDF', FALSE)) {
			require_once(FLOW_PATH_PACKAGES . 'Libraries/tcpdf/tcpdf.php');
		}
	}

	/**
	 * @return \ExtendedTcPdf
	 */
	public function createPdf() {
		$pdf = new \ExtendedTcPdf('P', 'mm', 'A4', true, 'UTF-8', false);
		return $pdf;
	}
}
?>