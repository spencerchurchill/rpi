<?php

	// Check for Lan IP on ethernet.
	$command="/sbin/ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'";
	$ethernetIP = exec($command);

	// Did you find an IP address?  If not, get it for wifi
	if(strlen($ethernetIP)  == 0){
		// echo "Nothing in ethernet!  ";
		$command="/sbin/ifconfig wlan0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'";
		$ethernetIP = exec($command);
	}
?>

<html>
<head>
    <title>Pineapple</title>
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
</head>

<body>
  <div class="main-container">
            <div class="main wrapper clearfix">
  <header>
  <h1>Pineapple Control Panel</h1>

</header>

<article>
<section>
  <p>
    Welcome to the Pineapple Control Panel! There are two ways to view and program the robot.
  </p>
  <p>
    The easiest and most user friendly way for you is to go in through VNC (virtual network connections), which will show you a little desktop in your browser with icons and folders.
  </p>
  <p>
    If you are a more advanced badass mofo and want to work in the command line, choose Terminal and have fun!
  </p>
  <section class="vnc">
  <a href="http://<?php echo $ethernetIP; ?>:8001">
    <img src="img/vnc.svg" onerror="this.src='img/vnc.png'; this.onerror=null;"style="height:128px;">
    <span class="button">Launch VNC</span>
  </a>
    <em>Password: <strong>mustelid</strong></em>

</section>
<section class="bash">
  <a href="http://<?php echo $ethernetIP; ?>:4200">
    <img src="img/bash.svg" onerror="this.src='img/bash.png'; this.onerror=null;"style="height:128px;">
    <span class="button">Launch Terminal</span>
  </a>
    <em>
      Username: <strong>pi</strong>
      <br/>
      Password: <strong>mustelid1</strong>
   </em>
</section>

<footer>
<h3>Want more info?</h3>

	<ul>
    <li>Use TensorFlow with <a href="http://<?php echo $ethernetIP; ?>:6007" target="_blank" class="product arduberry">TensorBoard.</a></li>
    <li>See more about the <a href="http://www.dexterindustries.com/brickpi-tutorials-documentation/?raspbian_for_robots" target="_blank" class="product brickpi">BrickPi.</a></li>
    <li>Try using <a href="http://<?php echo $ethernetIP; ?>:1880" target="_blank" class="product gopigo">Node-RED.</a></li>
    <li>Ask questions on <a href="http://raspberrypi.stackexchange.com" target="_blank" class="product grovepi">Stackexchange.</a></li>
    <li>If you're accessing Pineapple with port forwarding, use 99.90.73.0 as his IP.</li>
	</ul>
</footer>
</article>
</div> <!-- #main -->
   </div> <!-- #main-container -->

</body>
</html>
