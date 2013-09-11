<?php 
	
//Cefn.com Beerware License 2011

	chdir( dirname ( __FILE__ ) );

	//For your xwindows session to accept keyssent by this script (from inside an apache2 process), run
	//   xhost +local:

	$symmap = array('Previous' => "XF86AudioPrev",
			'Stop' => "XF86AudioStop",
			'PlayPause' => "XF86AudioPlay",
			'Next' => "XF86AudioNext",
			'Mute' => "XF86AudioMute",
			'Quieter' => "XF86AudioLowerVolume",
			'Louder' => "XF86AudioRaiseVolume");

	foreach($symmap as $title=>$sym){
		if(array_key_exists($title,$_POST)){
			$command = "DISPLAY=:0.0 xdotool key " . $sym; 
			//error_log($command);			
			system($command);
			header("Location: ".$_SERVER['PHP_SELF']);
    			die;
		}
	}

	//$dbus = file("./dbus.address");
	//exec("./showartist.sh",$result);
	//$result = print_r($result,true);

?>
<html>
<head>
	<link rel="stylesheet" href="style/style.css" ></link>
</head>
<body>
<div class="contents">
	<div class="buttons">
		<form action="index.php" method="POST" >
			<?php
				foreach($symmap as $title=>$sym){
					print("<input type='submit' class='btn $title' name='$title' value='' />");
				}
			?>		
		</form>
	</div>
</div>
</body>
<html>
