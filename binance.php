<?php

class Ticker {
	public static function jsonToTable($jsonText = '', $filter = '') {
		$arr = json_decode($jsonText, true);
		$html = '';
		if ($arr && is_array($arr)) {
			$html = '<table><tbody>';
			foreach ($arr as $key => $val) {
				if ($filter != '' && (stristr($filter, $val['symbol']) === FALSE)) {
					continue;
				}
				$html .= '<tr><td>'.$val['symbol'].'</td><td>'.$val['price'].'</td></tr>';
			}
			$html .= '</tbody></table>';
		}
		return $html;
	}	

}

$jsonText=file_get_contents('https://api.binance.com/api/v3/ticker/price');
echo Ticker::jsonToTable($jsonText);

