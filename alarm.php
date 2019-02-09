<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

    <head>
        <title>Audio test</title>

        <script type="text/javascript">
            /**
             * @param {string} filename The name of the file WITHOUT ending
             */
            function playSound(){   
                document.getElementById("sound").innerHTML='<audio autoplay="autoplay"><source src="fire_alarm.mp3" type="audio/mpeg" /><source src="fire_alarm.ogg" type="audio/ogg" /><embed hidden="true" autostart="true" loop="false" src="fire_alarm.mp3" /></audio>';
				//alert("mun");
            }

        </script>
    </head>

    <body onload="playSound()">
	<!-- Will try to play bing.mp3 or bing.ogg (depends on browser compatibility) 
        <button onclick="playSound();">Play</button> --> 
		<img src="images/tenor.gif"/>
        <div id="sound"></div>
		<script type="text/javascript">
            /**
             * @param {string} filename The name of the file WITHOUT ending
             */
            function playSound(){   
                document.getElementById("sound").innerHTML='<audio autoplay="autoplay"><source src="fire_alarm.mp3" type="audio/mpeg" /><source src="fire_alarm.ogg" type="audio/ogg" /><embed hidden="true" autostart="true" loop="true" src="fire_alarm.mp3" /></audio>';
				//alert("mun");
            }

        </script>

    </body>
</html>