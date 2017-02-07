<?php
	function redirectToIndexPage() {
		header("Location: index.php");
	}

    $timer = $_REQUEST["timer"];
    $value = $_REQUEST["value"];
    if(isset($timer))
    {
	switch ($timer)
	{
	case 'start':
	    shell_exec('cd /var/apex/bin && ./timer_control start');
	    redirectToIndexPage();
	    break;
	case 'stop':
	    shell_exec('cd /var/apex/bin && ./timer_control stop');
	    redirectToIndexPage();
	    break;
	case 'set':
	    if(isset($value)) shell_exec('cd /var/apex/bin && ./timer_control set '.$value);
	    redirectToIndexPage();
	    break;
	case 'increase':
	    shell_exec('cd /var/apex/bin && ./timer_control increase');
	    redirectToIndexPage();
	    break;
	case 'decrease':
	    shell_exec('cd /var/apex/bin && ./timer_control decrease');
	    redirectToIndexPage();
	    break;
	}
    }

    $extra = $_REQUEST["extra"];
    if(isset($extra))
    {
	switch ($extra)
	{
	case 'increase':
	    shell_exec('cd /var/apex/bin && ./extratime +1');
	    redirectToIndexPage();
	    break;
	case 'decrease':
	    shell_exec('cd /var/apex/bin && ./extratime -1');
	    redirectToIndexPage();
	    break;
	}
    }

    $score = $_REQUEST["score"];
    if(isset($score) && isset($value))
    {
        shell_exec('cd /var/apex/bin && ./score '.$score.' '.$value);
        redirectToIndexPage();
    }

?>

<html>
    <head>
	<meta charset="utf-8">
	<title>Apex titles</title>
	<style>
	    .nav
	    {
		font: bold normal 5em/2em Arial,sans-serif;
		text-shadow: 1px 1px white;
		color: #039;
		background-color: #eee;
		border: 1px solid #eee;
	    }

	    ul.nav
	    {
		margin: 0;
		padding: 0;
		list-style: none;
		text-align: center;
	    }

	    .nav li
	    {
		width: 100%;
		list-style-type: none;
		display: inline-block;
	    }

	    .nav a
	    {
		display: block;
		text-decoration: none;
		border: 1px solid #999;
	    }

	    .nav a:hover
	    {
		color: red;
		background-color: #fed;
		border: 1px dotted red;
	    }
	    .nav a:active
	    {
		color: black;
		background-color: #ccc;
		border: 1px dotted #999;
	    }

	</style>
    </head>

    <body>
	<ul class="nav">
	    <li>TIMER</li>
	    <li><a href="index.php?timer=start">START</a></li>
	    <li><a href="index.php?timer=stop">STOP</a></li>

	    <li><a href="index.php?timer=set&value=00:00">00:00</a></li>
	    <li><a href="index.php?timer=set&value=45:00">45:00</a></li>
	    <li><a href="index.php?timer=set&value=90:00">90:00</a></li>
	    <li><a href="index.php?timer=set&value=105:00">105:00</a></li>

	    <li><a href="index.php?timer=increase">INCREASE</a></li>
	    <li><a href="index.php?timer=decrease">DECREASE</a></li>
	</ul>

	<ul class="nav">
	    <li>EXTRA TIME</li>
	    <li><a href="index.php?extra=increase">+1</a></li>
	    <li><a href="index.php?extra=decrease">-1</a></li>
	</ul>

	<ul class="nav">
	    <li>SCORE</li>
	    <li><a href="index.php?score=host&value=+1">HOST +1</a></li>
	    <li><a href="index.php?score=guest&value=+1">GUEST +1</a></li>

	    <li><a href="index.php?score=host&value=-1">HOST -1</a></li>
	    <li><a href="index.php?score=guest&value=-1">GUEST -1</a></li>
	</ul>
  
    </body>
</html>
