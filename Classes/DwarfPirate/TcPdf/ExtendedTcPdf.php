<?php
namespace DwarfPirate\TcPdf;

/**
 * Class ExtendedTcPdf
 */
class ExtendedTcPdf extends \TCPDF {

	CONST PDF_FONT = 'helvetica';

	/**
	 * @var string
	 */
	protected $backgroundImage;

	/**
	 * @param $pathAndFileName
	 */
	public function setBackgroundImage($pathAndFileName) {
		$this->backgroundImage = $pathAndFileName;
	}

	/**
	 * overwrite the standard tcpdf header
	 */
	public function Header() {
		//$this->SetMargins(25, 50, 20);
		$bMargin = $this->getBreakMargin();
		$auto_page_break = $this->AutoPageBreak;
		$this->SetAutoPageBreak(false, 0);
		$this->Image($this->backgroundImage, 0, 0, 210, 297, 'jpeg', '', '', false, 300, '', false, false, 0);
		$this->SetAutoPageBreak($auto_page_break, $bMargin);
	}

	/**
	 * overwrite the standard tcpdf footer
	 */
	public function Footer() {
		$this->SetY(-15);
		$this->SetX(-70);
		$this->SetFont('helvetica', '', 10);
		$this->Cell(70, 10, 'Erstellt am: ' . date('d.m.Y') . ' | Seite '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(),
				0, false, 'R', 0, '', 0, false, 'T', 'M');
	}


/**
	 * page with background image
	 */
	public function addImagePage() {
		$this->AddPage();
	}

	/**
	 * @param $text
	 * @param array $coordinate
	 * @param array $font
	 * @example coordinate = array(x => , y =>, width =>, height =>, position => )
	 * @example font = array(fontSize => , fontColor => array(r => , g=> , b=>))
	 */
	public function createTextBox($text, $coordinates, $font = array(), $direction = 'L') {
		$this->SetXY($coordinates['x'], $coordinates['y']);
		$this->SetCurrentFont($font);
		$this->Cell($coordinates['width'], $coordinates['height'], $text, 0, $coordinates['position'], $direction);
	}

	/**
	 * @param $text
	 * @param array $coordinates
	 * @param $lines
	 * @param array $font
	 * @example coordinates = array(x => , y =>)
	 * @example font = array(fontSize => , fontColor => array(r => , g=> , b=>))
	 */
	public function createTextArea($text, $coordinates, $lines, $font = array()) {
		$this->SetXY($coordinates['x'], $coordinates['y'] + $lines);
		$this->SetCurrentFont($font);
		$length = $this->GetStringWidth($text);
		$this->MultiCell($length, $lines, $text, '', 'L');
	}

	/**
	 * @param $font
	 * @example font = array(font => , fontSize => , fontWeight => ,fontColor => array(c => , m=> , y=>, k=>), style => )
	 */
	public function setCurrentFont(array $font) {
		if (!empty($font)) {
			$this->SetFont('', '', $font['fontSize']);
			if (!empty($font['fontColor'])) {
				//$this->SetTextColor($font['fontColor']['c'], $font['fontColor']['m'], $font['fontColor']['y'], $font['fontColor']['k']);
			}
			if (!empty($font['fontWeight'])) {
				$this->SetFont('', $font['fontWeight'], $font['fontSize']);
			}
		} else {
			$this->SetFont(self::PDF_FONT, '', 12);
			$this->SetTextColor(0, 0, 0);
		}
	}

	/**
	 * @param $value
	 * @return string
	 */
	public function toNumberFormat($value) {
		return number_format($value, 2, ',', '.') . ' €';
	}

	/**
	 * @param $value
	 * @return string
	 */
	public function toRawNumberFormat($value) {
		return number_format($value, 2, ',', '.');
	}

	/**
	 * @param $y
	 */
	public function proofPageBreak($y) {
		if($this->getY() > $y) {
			$this->AddImagePage();
		}
	}

}