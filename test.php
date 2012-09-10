<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>播放器</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="plugin/slidy/slidy.js"></script>
<link type="text/css" rel="stylesheet" href="plugin/slidy/slidy.css" />
<script type="text/javascript">
$(document).ready(function() {
	$('.slidyContainer').slidy({
        throttle: false, // Set to true, and include jQuery throttle plugin (http://benalman.com/projects/jquery-throttle-debounce-plugin/)
        throttleTime: 500, // number of ms to wait for throttling
        showArrows: true, // Show arrows for next/prev image
        movePrev: 'movePrev', // Div id to use for previous button
        moveNext: 'moveNext', // Div id to use for next button
        useKeybord: true, // use keys defined below to expand / collapse sections
        auto: true,       // Start slideshow automatically
        interval: 6000,     // Time between each slide
        initialInterval: 10000  // Initial interval when page loads

    });
});
</script>

</head>

<body style="width:961; height:357">
<div id="slidyBanner" class="slidyContainer" title="播放器" style="width:961; height:357">
        <div class="slidySlides" style="width:961; height:357">

            <!-- Each slide is wrapped in figure section -->

            <!-- Slide 1 -->
            <!-- add the 'slidyCurrent' class to which slide you want as default -->
            <figure class="slidyCurrent">
                <!-- Your context goes here -->
                <iframe src="news.htm" width="961" height="357"></iframe>
            </figure>

            <!-- Slide 2 -->
            <figure>
                <iframe src="http://www.google.com" width="961" height="357"></iframe>
            </figure>

            <!-- Slide 3 -->
            <figure>
                <iframe src="http://www.facebook.com" width="961" height="357"></iframe>
            </figure>
            <figure>
                <iframe src="http://www.facebook.com" width="961" height="357"></iframe>
            </figure>
            <figure>
                <iframe src="http://www.facebook.com" width="961" height="357"></iframe>
            </figure>
            <figure>
                <iframe src="http://www.facebook.com" width="961" height="357"></iframe>
            </figure>

            <!-- Add more slides as necessary -->

        </div>
    </div>
</body>
</html>