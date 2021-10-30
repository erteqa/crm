<?php
$zoz=$video;

?>
        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<link rel="stylesheet" href="./index.css">--}}
    {{--<link rel="stylesheet" href="./index.css">--}}
    {{--<link rel="stylesheet" href="./src/ocplayer.min.css">--}}
    {{--<link rel="stylesheet" href="{{ URL::asset('js/ocplayer.min.css"') }}" />--}}
    {{--<link rel="stylesheet" href="{{ URL::asset('js/index.css"') }}" />--}}
    <link href="{{ asset('js/ocplayer.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/index.css') }}" rel="stylesheet">

    <!--<script src="./src/ojcplayer.min.js"></script>-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Videoplayer</title>

<body>
<div class="container-player">
    <div id="mediaPlayer">
        <div class="lds-ring" id=preload>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="embed-responsive embed-responsive-16by9 thumbnail">
        <video controls id='media-video'  oncontextmenu="return false;" controlsList="nodownload" style="width: 100%" >
            <source src="https://www.html5rocks.com/en/tutorials/video/basics/devstories.mp4" type='video/mp4'>
            <source src='parrots.webm' type='video/webm'>
        </video>
        </div>
        <div id="controls">
            <button id=play><i class="fas fa-pause"></i></button>
            <button id=audioVolume class="fas fa-volume-off"></button>
            <div id="progressBar">
                <div id="progress"></div>
            </div>
            <div id="timer">
                <span id="start"> 0 : 00</span>
            </div>
            <button id=expand><i class="fas fa-expand"></i></button>
        </div>
    </div>
    <div id="playlist">

    </div>
</div>

{{--<script src="./scripts/main.js"></script>--}}
<script>
    var eventId = '<?php echo json_encode($zoz); ?>';
var videos =JSON.parse(eventId);
   // alert("index="+videos[0].name);
</script>
<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>