<?php

$statuses = json_decode(file_get_contents('result'));
$statuses = $statuses->statuses;

$re = array();

foreach ( $statuses as $s ) {
	foreach ( $s as $d ) {
		$re[] = $d->message;
	}
}


?><!doctype html>
<html>
<head>
<meta name="encoding" value="utf-8" />
<title>I H8 FB</title>

<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/css/font-awesome.min.css" />

</head>
<body>

<div class="container">

	<div class="row-fluid">
		<div class="span6 offset3">
			<h1 style="text-align:center">And you are free</h1>
			<?php foreach ( $re as $r ) : ?>
			<blockquote><?= $r ?></blockquote>
			<?php endforeach ?>
		</div>
	</div>


<div>

</body>
</html>
