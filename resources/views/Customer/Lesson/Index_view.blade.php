@extends("layouts.Web_app")

@section('style')
    <link href="https://vjs.zencdn.net/7.5.5/video-js.css" rel="stylesheet">


    <link rel="stylesheet" href="{{ URL::asset('js/style.css') }}" />

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->

    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

    @endsection

@section('content')
    {{--<style>--}}
    {{--.sp{--}}
    {{--margin-left: 10px;--}}
    {{--}--}}
    {{--</style>--}}
    {{--<button onclick="enableAutoplay()" type="button">Enable autoplay</button>--}}
    {{--<button onclick="disableAutoplay()" type="button">Disable autoplay</button>--}}
    {{--<button onclick="checkAutoplay()" type="button">Check autoplay status</button><br>--}}

    {{--<video class="hidden-video vvv0" controls>--}}
    {{--<source src="https://s3-eu-west-1.amazonaws.com/fasihvidoes/2018-2019+MUFREDAT/4.+Sinif/Sosyal/U1/1.1.1.HERKESIN-BIR-KIMLIGI-VAR.mp4" type="video/mp4">--}}
    {{--</video>--}}

    {{--<script>--}}
    {{--var vid = document.getElementById("myVideo");--}}
    {{--function enableAutoplay() {--}}
    {{--vid.autoplay = true;--}}
    {{--vid.attr('src', "https://s3-eu-west-1.amazonaws.com/fasihvidoes/2018-2019+MUFREDAT/4.+Sinif/Sosyal/U1/1.1.1.HERKESIN-BIR-KIMLIGI-VAR.mp4");--}}
    {{--vid.load();--}}
    {{--}--}}


    {{--</script>--}}
    <div class="col-lg-12">
    {{--<div class="panel panel-primary">--}}
    {{--<div class="panel-heading">--}}
    {{--@if(count($Lesson)>0)--}}
    {{--{{__('lang.LessonName')}}: <span class="sp">{{$Lesson->name}}</span> <span class="sp"></span> ||--}}
    {{--{{__('lang.Time')}}:  <span class="sp">{{$Lesson->time}}</span> <span class="sp"></span>  ||--}}
    {{--{{__('lang.Date')}}: <span class="sp">{{$Lesson->date}}</span> <span class="sp"></span>  ||--}}
    {{--{{__('lang.timeshow')}}: <span class="sp">{{$Lesson->timeshow}}</span> <span class="sp"> {{__('lang.hours')}}</span>--}}
    {{--@endif--}}

    {{--</div>--}}
    {{--<!-- /.panel-heading -->--}}
    {{--<div class="panel-body">--}}

    {{--<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">--}}
    {{--<thed>--}}
    {{--<tr>--}}
    {{--<th>#</th>--}}
    {{--<th>{{__('lang.name') }}</th>--}}
    {{--<th>{{__('lang.link') }}</th>--}}
    {{--<th>{{__('lang.time') }}</th>--}}
    {{--<th>{{__('lang.date') }}</th>--}}
    {{--</tr>--}}
    {{--</thed>--}}
    {{--<tbody>--}}
    {{--<?php $i=1;?>--}}
    {{--{{count($Parts)}}--}}
    {{--@if(count($Parts)>0)--}}
    {{--@foreach($Parts as $Part)--}}
    {{--<tr class="odd gradeX">--}}
    {{--<td>{{$i}}</td>--}}
    {{--<td>{{$Part->name}}</td>--}}
    {{--<td class="embed-container">--}}
    {{--<video oncontextmenu="return false;"  controls>--}}
    {{--<source src="https://yoursite.com/yourvideo.mp4" >--}}
    {{--</video>--}}
    {{--</td>--}}
    {{--<td>  <iframe src="{{$Part->link}}" allowfullscreen="" frameborder="0" ></iframe> </td>--}}
    {{--<td><a href="{{$Part->link}}" >{{__('lang.linkopen') }}</a></td>--}}
    {{--<video id="sampleMovie" src="{{$Part->link}}" width=”640” height=”360”></video>--}}

    {{--<td>{{$Part->time}}</td>--}}
    {{--<td>{{$Part->date}}</td>--}}
    {{--</tr>--}}
    {{--<?php $i++;?>--}}

    {{--@endforeach--}}
    {{--@endif--}}
    {{--</tbody>--}}
    {{--</table>--}}
    {{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--$('#dataTables-example').DataTable({--}}
    {{--responsive: true,--}}
    {{--stateSave: true--}}

    {{--});--}}
    {{--});--}}
    {{--function del($url) {--}}
    {{--var $ret_val = confirm('Yes Or No');--}}
    {{--if ($ret_val == true) {--}}
    {{--window.location.href = $url;--}}
    {{--}--}}
    {{--}--}}
    {{--</script>--}}
    {{--</div>--}}
    {{--<!-- /.panel-body -->--}}
    {{--</div>--}}
    <!-- /.panel -->
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    </video>

    <div class="topControl">
        <div class="progress">
            <span class="bufferBar"></span>
            <span class="timeBar"></span>
        </div>
        <div class="time">
            <span class="current"></span> /
            <span class="duration"></span>
        </div>
    </div>
    {{--<script src="./scripts/main.js"></script>--}}
    {{--<link rel="stylesheet" href="{{ URL::asset('js/index.css') }}" />--}}
    {{--<script src="{{ asset('assets/js/custom.min.js') }}"></script>--}}
    <div class="controllers">
        <button class="btnPlay" title="Play/Pause video"></button>
        <button class="prevvid disabled" title="Previous video"><i class="fa fa-step-forward fa-rotate-180"></i>
        </button>
        <button class="nextvid" title="Next video"><i class="fa fa-step-forward"></i></button>
        <button class="sound sound2 btn" title="Mute/Unmute sound"></button>
        <div class="volume" title="Set volume">
            <span class="volumeBar"></span>
        </div>
        <button class="btnFS " style="float:right" title="full screen"></button>
        <button class="btnspeed " style="float:right" title="Video speed"><i class="fa fa-gear"></i></button>
        <ul class="speedcnt">
            <li class="spdx50">1.5</li>
            <li class="spdx25">1.25</li>
            <li class="spdx1 selected">Normal</li>
            <li class="spdx050">0.5</li>
        </ul>
        <button class="btnLight lighton " style="float:right" title="on/off light"><i class="fa fa-lightbulb-o"></i>
        </button>
    </div>
    <div class="ads">
        <span class="closeme fa fa-close"></span>

    </div>
    <div class="bigplay" title="play the video"><i class="fa fa-play-circle-o"></i></div>
    <div class="loading"><i class="fa fa-spinner fa-spin"></i></div>
    </div>

    <div class="videolist">
        <nav class="vids">

            @if(count($Parts)>0)
                @foreach($Parts as $Part)
                <a class="link" href="{{$Part->link}}">{{$Part->name}}</a>

                @endforeach
            @endif
        </nav>
    </div>
    <script>

        /* nice mp4 video playlist with jQuery
   created by: Menni Mehdi
   in : 23/01/2016
   license : if you like it use it
*/


        $(document).ready(function()

        {
            var vid = $('#myvid');
alert('gjfgj');
            //default video source
            $(vid).attr("src", $("a.link:first").attr("href"));

            // addClass playing to first video link
            $("a.link:first").addClass("playing");


            $("a.link").on("click" , function  (event) {

                // prevent link default
                event.preventDefault();

                // change video source
                $(vid).attr("src", $(this).attr("href"));

                // remouve class playing from unplayed video href
                $(".vids a").removeClass("playing");

                // add class playing to video href
                $(this).addClass("playing");

                // add class paused to give the play/pause button the right look
                $('.btnPlay').addClass('paused');

                // play the video
                vid[0].play();

                // adjust prev button state
                if ($("a.link:first").hasClass("playing")) {
                    $(".prevvid").addClass("disabled");
                }
                else {
                    $(".prevvid").removeClass("disabled");
                }

                // adjust next button state
                if ($("a.link:last").hasClass("playing")) {
                    $(".nextvid").addClass("disabled");
                }
                else {
                    $(".nextvid").removeClass("disabled");
                }

            });


//VIDEO EVENTS
            //video canplay event
            vid.on('canplay', function() {
                $('.loading').fadeOut(100);
            });

            //video canplaythrough event
            //solve Chrome cache issue
            var completeloaded = false;
            vid.on('canplaythrough', function() {
                completeloaded = true;
            });

            //video ended event
            vid.on('ended', function() {
                $('.btnPlay').removeClass('paused');
                vid[0].pause();
            });

            //video seeking event
            vid.on('seeking', function() {
                //if video fully loaded, ignore loading screen
                if(!completeloaded) {
                    $('.loading').fadeIn(200);
                }
            });

            //video seeked event
            vid.on('seeked', function() { });

            //video waiting for more data event
            vid.on('waiting', function() {
                $('.loading').fadeIn(200);
            });

            /*controllers*/
//before everything get started
            vid.on('loadedmetadata', function() {
//set video properties
                $('.current').text(timeFormat(0));
                $('.duration').text(timeFormat(vid[0].duration));
                if(vid[0].muted)
                {
                    updateVolume(0, 0);
                }else
                {
                    updateVolume(0 , 0.7);
                }
            });

//display video buffering bar
            var startBuffer = function() {
                var currentBuffer = vid[0].buffered.end(0);
                var maxduration = vid[0].duration;
                var perc = 100 * currentBuffer / maxduration;
                $('.bufferBar').css('width',perc+'%');

                if(currentBuffer < maxduration) {
                    setTimeout(startBuffer, 500);
                }
            };


//display current video play time
            vid.on('timeupdate', function() {
                var currentPos = vid[0].currentTime;
                var maxduration = vid[0].duration;
                var perc = 100 * currentPos / maxduration;
                $('.timeBar').css('width',perc+'%');
                $('.current').text(timeFormat(currentPos));
            });

//CONTROLS EVENTS
            //video screen and play button clicked
            vid.on('click', function() { playpause(); } );
            $('.btnPlay').on('click', function() { playpause(); } );
            var playpause = function() {
                if(vid[0].paused || vid[0].ended) {
                    $('.btnPlay').addClass('paused');
                    vid[0].play();
                }
                else {
                    $('.btnPlay').removeClass('paused');
                    vid[0].pause();
                }
            };

            //VIDEO PROGRESS BAR
            //when video timebar clicked
            var timeDrag = false;   /* check for drag event */
            $('.progress').on('mousedown', function(e) {
                timeDrag = true;
                updatebar(e.pageX);
            });
            $(document).on('mouseup', function(e) {
                if(timeDrag) {
                    timeDrag = false;
                    updatebar(e.pageX);
                }
            });
            $(document).on('mousemove', function(e) {
                if(timeDrag) {
                    updatebar(e.pageX);
                }
            });
            var updatebar = function(x) {
                var progress = $('.progress');

                //calculate drag position
                //and update video currenttime
                //as well as progress bar
                var maxduration = vid[0].duration;
                var position = x - progress.offset().left;
                var percentage = 100 * position / progress.width();
                if(percentage > 100) {
                    percentage = 100;
                }
                if(percentage < 0) {
                    percentage = 0;
                }
                $('.timeBar').css('width',percentage+'%');
                vid[0].currentTime = maxduration * percentage / 100;
            };
//sound button clicked
            $('.sound').click(function() {
                vid[0].muted = !vid[0].muted;
                $(this).toggleClass('muted');
                if(vid[0].muted) {
                    $('.volumeBar').css('width',0);
                }
                else{
                    $('.volumeBar').css('width', vid[0].volume*100+'%');
                }
            });

            //VOLUME BAR
            //volume bar event
            var volumeDrag = false;
            $('.volume').on('mousedown', function(e) {
                volumeDrag = true;
                vid[0].muted = false;
                $('.sound').removeClass('muted');
                updateVolume(e.pageX);
            });
            $(document).on('mouseup', function(e) {
                if(volumeDrag) {
                    volumeDrag = false;
                    updateVolume(e.pageX);
                }
            });
            $(document).on('mousemove', function(e) {
                if(volumeDrag) {
                    updateVolume(e.pageX);
                }
            });
            var updateVolume = function(x, vol) {
                var volume = $('.volume');
                var percentage;
                //if only volume have specificed
                //then direct update volume
                if(vol) {
                    percentage = vol * 100;
                }
                else {
                    var position = x - volume.offset().left;
                    percentage = 100 * position / volume.width();
                }

                if(percentage > 100) {
                    percentage = 100;
                }
                if(percentage < 0) {
                    percentage = 0;
                }

                //update volume bar and video volume
                $('.volumeBar').css('width',percentage+'%');
                vid[0].volume = percentage / 100;

                //change sound icon based on volume
                if(vid[0].volume == 0){
                    $('.sound').removeClass('sound2').addClass('muted');
                }
                else if(vid[0].volume > 0.5){
                    $('.sound').removeClass('muted').addClass('sound2');
                }
                else{
                    $('.sound').removeClass('muted').removeClass('sound2');
                }

            };

            //speed text clicked
            $('.spdx50').on('click', function() { fastfowrd(this, 1.5); });
            $('.spdx25').on('click', function() { fastfowrd(this, 1.25); });
            $('.spdx1').on('click', function() { fastfowrd(this, 1); });
            $('.spdx050').on('click', function() { fastfowrd(this, 0.5); });
            var fastfowrd = function(obj, spd) {
                $('.speedcnt li').removeClass('selected');
                $(obj).addClass('selected');
                vid[0].playbackRate = spd;
                vid[0].play();
                $("ul.speedcnt").fadeOut("fast");
                $('.btnPlay').addClass('paused');
            };
            $(".btnspeed").click( function() {

                $("ul.speedcnt").slideToggle(100);
            });

            //fullscreen button clicked
            $('.btnFS').on('click', function() {
                if($.isFunction(vid[0].webkitEnterFullscreen)) {
                    vid[0].webkitEnterFullscreen();
                }
                else if ($.isFunction(vid[0].mozRequestFullScreen)) {
                    vid[0].mozRequestFullScreen();
                }
                else {
                    alert('Your browsers doesn\'t support fullscreen');
                }
            });

            //light bulb button clicked
            $('.btnLight').click(function() {
                $(this).toggleClass('lighton');

                //if lightoff, create an overlay
                if(!$(this).hasClass('lighton')) {
                    $('body').append('<div class="overlay"></div>');
                    $('.overlay').css({
                        'position':'absolute',
                        'width':100+'%',
                        'height':$(document).height(),
                        'background':'#000',
                        'opacity':0.9,
                        'top':0,
                        'left':0,
                        'z-index':999
                    });
                    $('.vidcontainer').css({
                        'z-index':1000
                    });
                }
                //if lighton, remove overlay
                else {
                    $('.overlay').remove();
                }
            });

//hide pause button if video onplaying
//if (vid.onplaying = true) { $('.btnPlay').addClass('paused'); };


//previous video button
            $(".prevvid").click(function(){
                $(vid).attr("src", $(".playing").prev().attr("href"));
                vid[0].play();
                $(".playing").prev().addClass("playing");
                $(".playing:last").removeClass("playing");
                $('.btnPlay').addClass('paused');
                $(".nextvid").removeClass("disabled");
                if ($("a.link:first").hasClass("playing")) {
                    $(this).addClass("disabled");
                }else {
                    $(this).removeClass("disabled");
                };
            });

//previous video button
            $(".nextvid").click(function(){
                $(vid).attr("src", $(".playing").next().attr("href"));
                vid[0].play();
                $(".playing").next().addClass("playing");
                $(".playing:first").removeClass("playing");
                $('.btnPlay').addClass('paused');
                $(".prevvid").removeClass("disabled");
                if ($("a.link:last").hasClass("playing")) {
                    $(this).addClass("disabled");
                }else {
                    $(this).removeClass("disabled");
                };

            });



//Time format converter - 00:00
            var timeFormat = function(seconds){
                var m = Math.floor(seconds/60)<10 ? "0"+Math.floor(seconds/60) : Math.floor(seconds/60);
                var s = Math.floor(seconds-(m*60))<10 ? "0"+Math.floor(seconds-(m*60)) : Math.floor(seconds-(m*60));
                return m+":"+s;
            };
            $(".closeme , .bigplay").click(function(){
                $("this,.ads,.bigplay").fadeOut(200);
                vid[0].play();
                $('.btnPlay').addClass('paused');
            });
//end
        });

    </script>
    </div>

@endsection
@section('subject')


@endsection

{{--<script>--}}
{{--function secondsTimeSpanToHMS(s) {--}}
{{--var h = Math.floor(s/3600);--}}
{{--s -= h*3600;--}}
{{--var m = Math.floor(s/60);--}}
{{--s -= m*60;--}}
{{--return h+":"+(m < 10 ? '0'+m : m)+":"+(s < 10 ? '0'+Math.round(s) : Math.round(s));--}}
{{--}--}}
{{--$(function() {--}}

{{--$('#vp2_html5_rightSidePlaylist_FC').vp2_html5_rightSidePlaylist_Video({--}}
{{--skin: 'universalWhite',--}}
{{--borderWidth: 0,--}}
{{--borderColor: '#000000',--}}
{{--seekBarAdjust:285,--}}
{{--responsive: true--}}
{{--});--}}

{{--$('.hidden_vids').append('<video class="hidden-video vvv0" controls><source src="https://s3-eu-west-1.amazonaws.com/fasihvidoes/2018-2019+MUFREDAT/4.+Sinif/Sosyal/U1/1.1.1.HERKESIN-BIR-KIMLIGI-VAR.mp4" type="video/mp4"></video>');--}}
{{--var _VIDEO0 = $('.vvv0');--}}
{{--_VIDEO0.attr('src', "https://s3-eu-west-1.amazonaws.com/fasihvidoes/2018-2019+MUFREDAT/4.+Sinif/Sosyal/U1/1.1.1.HERKESIN-BIR-KIMLIGI-VAR.mp4");--}}
{{--_VIDEO0.load();--}}

{{--_VIDEO0.on('loadedmetadata', function() {--}}
{{--console.log( secondsTimeSpanToHMS(_VIDEO0[0].duration) );--}}
{{--$('.vid_dur0').html(secondsTimeSpanToHMS(_VIDEO0[0].duration));--}}

{{--});--}}
{{--$('.hidden_vids').append('<video class="hidden-video vvv1" controls><source src="https://s3-eu-west-1.amazonaws.com/fasihvidoes/2018-2019+MUFREDAT/4.+Sinif/Sosyal/U1/1.1.2.herkesin-bir-oykusu-var.mp4" type="video/mp4"></video>');--}}
{{--var _VIDEO1 = $('.vvv1');--}}
{{--_VIDEO1.attr('src', "https://s3-eu-west-1.amazonaws.com/fasihvidoes/2018-2019+MUFREDAT/4.+Sinif/Sosyal/U1/1.1.2.herkesin-bir-oykusu-var.mp4");--}}
{{--_VIDEO1.load();--}}

{{--_VIDEO1.on('loadedmetadata', function() {--}}
{{--console.log( secondsTimeSpanToHMS(_VIDEO1[0].duration) );--}}
{{--$('.vid_dur1').html(secondsTimeSpanToHMS(_VIDEO1[0].duration));--}}

{{--});--}}
{{--$('.hidden_vids').append('<video class="hidden-video vvv2" controls><source src="https://s3-eu-west-1.amazonaws.com/fasihvidoes/2018-2019+MUFREDAT/4.+Sinif/Sosyal/U1/1.3.1.NELERDEN-HOSLANIYORUM-NELERI-YAPABILIRIM-P1.mp4" type="video/mp4"></video>');--}}
{{--var _VIDEO2 = $('.vvv2');--}}
{{--_VIDEO2.attr('src', "https://s3-eu-west-1.amazonaws.com/fasihvidoes/2018-2019+MUFREDAT/4.+Sinif/Sosyal/U1/1.3.1.NELERDEN-HOSLANIYORUM-NELERI-YAPABILIRIM-P1.mp4");--}}
{{--_VIDEO2.load();--}}

{{--_VIDEO2.on('loadedmetadata', function() {--}}
{{--console.log( secondsTimeSpanToHMS(_VIDEO2[0].duration) );--}}
{{--$('.vid_dur2').html(secondsTimeSpanToHMS(_VIDEO2[0].duration));--}}

{{--});--}}
{{--$('.hidden_vids').append('<video class="hidden-video vvv3" controls><source src="https://s3-eu-west-1.amazonaws.com/fasihvidoes/2018-2019+MUFREDAT/4.+Sinif/Sosyal/U1/1.3.1.NELERDEN-HOSLANIYORUM-NELERI-YAPABILIRIM-P2.mp4" type="video/mp4"></video>');--}}
{{--var _VIDEO3 = $('.vvv3');--}}
{{--_VIDEO3.attr('src', "https://s3-eu-west-1.amazonaws.com/fasihvidoes/2018-2019+MUFREDAT/4.+Sinif/Sosyal/U1/1.3.1.NELERDEN-HOSLANIYORUM-NELERI-YAPABILIRIM-P2.mp4");--}}
{{--_VIDEO3.load();--}}

{{--_VIDEO3.on('loadedmetadata', function() {--}}
{{--console.log( secondsTimeSpanToHMS(_VIDEO3[0].duration) );--}}
{{--$('.vid_dur3').html(secondsTimeSpanToHMS(_VIDEO3[0].duration));--}}

{{--});--}}
{{--$('.hidden_vids').append('<video class="hidden-video vvv4" controls><source src="https://s3-eu-west-1.amazonaws.com/fasihvidoes/2018-2019+MUFREDAT/4.+Sinif/Sosyal/U1/1.3.1.NELERDEN-HOSLANIYORUM-NELERI-YAPABILIRIM-P3.mp4" type="video/mp4"></video>');--}}
{{--var _VIDEO4 = $('.vvv4');--}}
{{--_VIDEO4.attr('src', "https://s3-eu-west-1.amazonaws.com/fasihvidoes/2018-2019+MUFREDAT/4.+Sinif/Sosyal/U1/1.3.1.NELERDEN-HOSLANIYORUM-NELERI-YAPABILIRIM-P3.mp4");--}}
{{--_VIDEO4.load();--}}

{{--_VIDEO4.on('loadedmetadata', function() {--}}
{{--console.log( secondsTimeSpanToHMS(_VIDEO4[0].duration) );--}}
{{--$('.vid_dur4').html(secondsTimeSpanToHMS(_VIDEO4[0].duration));--}}

{{--});--}}

{{--});--}}


{{--</script>--}}
