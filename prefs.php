<?php
// Load Config
$config = parse_ini_file('config.ini');

// Declare Variables
$dbSuccess = false;
$dbVersion = false;

// Connect to SQL Server
$conn = @new mysqli($config['hostname'], $config['username'], $config['password'], $config['dbname']);

if ($conn->connect_errno) {
}
else {
    $dbSuccess = true;
}
$sql = "SELECT version FROM dbversion ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $dbVersion = $row['version'];
    }
}


// Close Connection
$conn->close(); ?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="book.ico">

    <title>DevOps Demo Application</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="inner cover">
                <h1 class="cover-heading">My Prefs</h1>
                <p class="lead"><i>This page is used for demonstrating the usage of vars, templates and precedence rules.</i></p>
   	        <h3>Color: <span class="label label-info"><?php echo $config['color'] ?></span></h3> 
		<h3>Fruit: <span class="label label-info"><?php echo $config['fruit'] ?></span></h3>
		<h3>Car: <span class="label label-info"><?php echo $config['car'] ?></span></h3>
		<h3>Laptop: <span class="label label-info"><?php echo $config['laptop'] ?></span></h3>
            </div>

            <div class="mastfoot">
                <div class="inner">
                    <p>DevOps Demo application is customized by  <a href="https://www.schoolofdevops.com/">School of Devops</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>

</body></html>
