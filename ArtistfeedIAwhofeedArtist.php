<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css"></link>
<!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
	<?php
        $somePath = "AAIA";
		$subdirs = glob($somePath . '/*' , GLOB_ONLYDIR);
        if (sizeof($subdirs) > 1) {
            $choosenSerie = rand ( 0 , sizeof($subdirs)-1 );
        }
        else {
            $choosenSerie = 0;
        }

        $thePath = $subdirs[$choosenSerie];
        $theList = glob($thePath."/*.txt")[0];

        $json_data = file_get_contents($theList);
        $arr = json_decode($json_data, true);

        $tableSize = (((sizeof($arr) * 2) * 255) + 250);

	?>
    <title>Machine Jacqueline -- <?php echo $subdirs[$choosenSerie]; ?></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

</head>
<body>
<div id="serie_list" class="blured">
    <?php echo '<table id="serie" width="'.$tableSize.'px">' ?>
    <tr>
    <?php

        for ($x = 0; $x <= sizeof($arr); $x++) {
            $imgNum = $x + 1;
            if ($imgNum <= sizeof($arr)) {
                echo "<td class='serie_img'><img class='serie_img' src='".$thePath."/".$imgNum.".gif'></img></td>";
            }
            echo "<td class='serie_sentence' valign='middle'>".$arr[$x]."</td>";
        } 
    ?>
    </tr>
    </table>
</div>

<div id="info">
    <div id="infotxt">
        <center>
        <h1>Artist feeds AI who feeds Artist </h1>
        <h2>Artist creates an animation and send its first frame to the AI.<br> The AI answers with a sentence used as incitement by the artist <br>to create a new animation.<br><br>
        </h2>
        <h3>
            IA used : <a href="https://azure.microsoft.com/en-us/services/cognitive-services/computer-vision/">Microsoft Azure</a><br><br>
            Created during the workshop 
            <i>Machine Jacking</i> <br>organised by <a href="http://chevalvert.fr">ChevalVert</a> at <a href="http://stereolux.org">Stereolux</a> in December 2017<br>
        </h3>
        </center>
    </div>
</div>
<div id="menu">
    <div  id="infobttn">i</div>
    <div onclick="location.href='http://maudetsamy.com/MachineJacqueline'"><</div>

</div>
<script type="text/javascript"> 
    $("#infobttn").click(function() {
        $("#info").toggleClass("hidden");
        $("#serie_list").toggleClass("blured");
    });
    $("#info").click(function() {
        $(this).addClass("hidden");
        $("#serie_list").removeClass("blured");
    });
</script>
</body>
</html>