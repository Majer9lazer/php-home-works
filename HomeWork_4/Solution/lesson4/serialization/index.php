<?php

// ajax

$x = [
	'a' => 3,
	'b' => 'string',
	'abc' => 'ok',
	99,
	88 => 101,
	103,
	'd4' => 567567,
	'd5' => 789789,
	'd6' => 890890,
	98989324 => 3324234,
];

$t = microtime(1);
for ($i = 0; $i < 100000; ++$i) {
	$xSerialized = serialize($x);
}

echo 'serl: ' . (microtime(1) - $t) . '<br>';

$xUnserialized = unserialize($xSerialized);

$t = microtime(1);
for ($i = 0; $i < 100000; ++$i) {
	$xJson = json_encode($x);
}
echo 'json: ' . (microtime(1) - $t) . '<br>';

var_dump($xSerialized);
echo '<br>';
var_dump($xJson);

