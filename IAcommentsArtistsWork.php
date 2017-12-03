<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css"></link>
<!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
    <?php
        function get_pics($dir = 'images_a')
            {
                $files = glob($dir . '/*.png');
                return $files; //$files[$file]
            }
        $cur_files = get_pics();
    ?>
    <title>Machine Jacqueline -- AI comments Artist's work</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script type="text/javascript">
    function processImage() {
        // **********************************************
        // *** Update or verify the following values. ***
        // **********************************************

        // Replace the subscriptionKey string value with your valid subscription key.
        var subscriptionKey = "4c17e042f46c42778b795204416fe1f4";

        // Replace or verify the region.
        //
        // You must use the same region in your REST API call as you used to obtain your subscription keys.
        // For example, if you obtained your subscription keys from the westus region, replace
        // "westcentralus" in the URI below with "westus".
        //
        // NOTE: Free trial subscription keys are generated in the westcentralus region, so if you are using
        // a free trial subscription key, you should not need to change this region.
        var uriBase = "https://westcentralus.api.cognitive.microsoft.com/vision/v1.0/analyze";
        // Request parameters.
        var params = {
            "visualFeatures": "Description",
            "details": "",
            "language": "en",
        };

        var drawings_list = <?php echo json_encode($cur_files); ?>; // we get once the list from php
        var drawing = drawings_list[Math.floor(Math.random()*drawings_list.length)];


        // Display the image.
        var sourceImageUrl = "http://maudetsamy.com/MachineJacqueline/"+drawing;

        // Perform the REST API call.
        $.ajax({
            url: uriBase + "?" + $.param(params),
            // Request headers.
            beforeSend: function(xhrObj){
                xhrObj.setRequestHeader("Content-Type","application/json");
                xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key", subscriptionKey);
            },
            type: "POST",
            // Request body.
            data: '{"url": ' + '"' + sourceImageUrl + '"}',
        })

        .done(function(data) {
            // Show formatted JSON on webpage.
            //json = JSON.parse(data);
            description = data.description.captions[0].text;
            confidence = data.description.captions[0].confidence;
            document.querySelector("#inputImage").src = sourceImageUrl;
            $("#legende").text(description);
            $("#conf").text("["+confidence+"]");
        })

        .fail(function(jqXHR, textStatus, errorThrown) {
            // Display error message.
            var errorString = (errorThrown === "") ? "Error. " : errorThrown + " (" + jqXHR.status + "): ";
            errorString += (jqXHR.responseText === "") ? "" : jQuery.parseJSON(jqXHR.responseText).message;
            alert(errorString);
        });
    };

    $(document).ready(function () {
        $(document).ajaxStart(function () {
            $("#loading").show();
            document.querySelector("#inputImage").src = "https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif";

            $("#legende").text("AI is working...");
            $("#conf").text("");
            
        }).ajaxStop(function () {
            //$("#loading").hide();
        });
    });
    
</script>
</head>
<body>
<div id="artistwork" class="blured">
<figure>
     <img id="inputImage" />
     <figcaption id="legende"></figcaption>
     <figcaption id="conf"></figcaption>
</figure>
</div>


<div id="info" class="">
    <div id="infotxt">
        <center>
    <h1>AI comments Artist's work </h1>
    <h2>A cadavre exquis made by artists is sent to an AI.<br> The AI answers with a sentence and its confidence rate.<br><br>
    </h2>
    <h3>
        AI used : <a href="https://azure.microsoft.com/en-us/services/cognitive-services/computer-vision/">Microsoft Azure</a><br><br>
        Created during the workshop 
        <i>Machine Jacking</i> <br>organised by <a href="http://chevalvert.fr">ChevalVert</a> at <a href="http://stereolux.org">Stereolux</a> in December 2017<br>
    </h3>
</center>
</div>
</div>
<div id="menu">
    <div  id="reload" onclick="processImage();"><img src="reloadIcon.png" style="width:100%; height:100%;"></img></div>
    <div  id="infobttn">i</div>
    <div onclick="location.href='http://maudetsamy.com/MachineJacqueline'"><</div>

</div>
<script type="text/javascript"> 
    processImage();
    $("#infobttn").click(function() {
        $("#info").toggleClass("hidden");
        $("#artistwork").toggleClass("blured");
    });
    $("#info").click(function() {
        $(this).addClass("hidden");
        $("#artistwork").removeClass("blured");
    });
</script>
</body>
</html>