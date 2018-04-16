<?php
namespace DwarfPirate\TcPdf;

/**
 * Class ExtendedTcPdf
 */
class LandscapeExtendedTcPdf extends ExtendedTcPdf {

	/**
	 * overwrite the standard tcpdf header
	 */
	public function Header() {
		//$this->SetMargins(25, 50, 20);
		$bMargin = $this->getBreakMargin();
		$auto_page_break = $this->AutoPageBreak;
		$this->SetAutoPageBreak(false, 0);
		$this->Image($this->backgroundImage, 0, 0, 297, 210, 'jpeg', '', '', false, 300, '', false, false, 0);
		$this->SetAutoPageBreak($auto_page_break, $bMargin);
	}

	/**
	 * @param $font
	 * @example font = array(font => , fontSize => , fontWeight => ,fontColor => array(c => , m=> , y=>, k=>), style => )
	 */
	public function setCurrentFont(array $font) {
		if (!empty($font)) {
			$this->SetFont('', '', $font['fontSize']);
			if (!empty($font['fontColor'])) {
				$this->SetTextColor($font['fontColor']['c'], $font['fontColor']['m'], $font['fontColor']['y'], $font['fontColor']['k']);
			}
			if (!empty($font['fontWeight'])) {
				$this->SetFont('', $font['fontWeight'], $font['fontSize']);
			}
		} else {
			$this->SetFont(self::PDF_FONT, '', 12);
			$this->SetTextColor(0, 0, 0);
		}
	}
}
