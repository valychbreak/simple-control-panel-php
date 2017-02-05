<?php
	
	error_reporting(E_ALL);

	$testActionResult = "";
	$notificationMessage = "";

	function processAction($action) {
		switch ($action) {
			case 'stream_start':
				onStreamActionStart();
				break;

			case 'stream_stop':
				onStreamActionStop();
				break;
			
			case 'stream_restart':
				onStreamActionRestart();
				break;

			default:
				# code...
				break;
		}
	}

	function onStreamActionStart() {
		$output = shell_exec('sh simple-script.sh');
		$GLOBALS['notificationMessage'] = "The stream has been started". $output;
	}

	function onStreamActionStop() {
		$GLOBALS['notificationMessage'] = "The stream has been stopped";
	}

	function onStreamActionRestart() {
		$GLOBALS['notificationMessage'] = "The stream has been restarted";
	}

	if(isset($_REQUEST["action"])) {
		$currentAction = $_REQUEST["action"];
		processAction($currentAction);
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="assets/starter-template.css">
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
	</head>

	<body>
	<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Navbar</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com/" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div class="container">

      <!-- <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div> -->
      <div id="control-panel">
      	<a href="index?action=stream_start" class="btn btn-success">Start</a>
      	<a href="index?action=stream_stop" class="btn btn-danger">Stop</a>
      	<a href="index?action=stream_restart" class="btn btn-secondary">Restart</a>
      </div>
      <div id="notification">
		<?php echo $notificationMessage;?>		
	  </div>
    </div><!-- /.container -->

    <script src="assets/jquery/jquery-3.1.1.min.js"></script>
    <script src="assets/tether/js/tether.js"></script>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
	</body>
</html>
