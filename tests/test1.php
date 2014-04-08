<?

	require_once '../dist/String.class.php';
	
	header('Content-Type: text/plain; charset=utf-8');
	$test = new String('hello!');
	echo $test->toUpper();

?>