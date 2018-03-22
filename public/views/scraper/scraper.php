<?php
$code = new DOMDocument(file_get_contents('https://www.jumbo.com/producten'));
$html = file_get_contents('https://www.jumbo.com/producten');
preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i',$html, $matches );

echo "<pre>";
//var_dump( $matches);
var_dump($code);
echo "</pre>";
echo '<img src="https://www.jumbo.com' . $matches[ 1 ][ 19 ] . '" />';
echo '<img src="https://www.jumbo.com' . $matches[ 1 ][ 1 ] . '" />';

//var_dump($code->getElementById('sku-129647STK'));
?>