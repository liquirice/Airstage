<?php
session_start();
?>

<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER ['HTTP_HOST'] ?>/plugin/shadowbox/shadowbox.css">
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/css/navistyle.css" />
<script type="text/javascript" language="javascript" src="http://<?php echo $_SERVER ['HTTP_HOST'] ?>/plugin/jrumble/jquery.jrumble.1.3.min.js"></script>
<script type="text/javascript" language="javascript" src="http://<?php echo $_SERVER ['HTTP_HOST'] ?>/plugin/shadowbox/shadowbox.js"></script>
<script language="javascript" type="text/javascript">
$(document).ready(function() {
	$("a").css("text-decoration", "none");
	Shadowbox.init({
		players : ['html'],
		overlayColor: "#FFFFFF",
	});
	$("#logo").jrumble({
        	x:2,
        	y:2,
        	rotation:1,
        });
        $("#logo").hover(function(){
        	$(this).trigger("startRumble"); 
        }, function(){
        	$(this).trigger("stopRumble");
        });
	if(app == "index"){
    	$("#walltop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0102.png");
    	$("#coltop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b02.png");
    	$("#markettop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b03.png");
    	$("#membertop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0601.png");
    	
    	$("#walltop").hover(function(){
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0103.png");
    	}, function() { 
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0102.png");
    	});
    	$("#coltop").hover(function(){
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0203.png");
    	}, function() { 
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b02.png");
    	});
    	$("#markettop").hover(function(){
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0303.png");
    	}, function() { 
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b03.png");
    	});
    	$("#membertop").hover(function(){
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0603.png");
    	}, function() { 
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0601.png");
    	});
    }
    else if(app == "apps"){
    	$("#walltop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b01.png");
    	$("#coltop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b02.png");
    	$("#markettop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b03.png");
    	$("#membertop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0602.png");
    	
    	$("#walltop").hover(function(){
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0103.png");
    	}, function() { 
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b01.png");
    	});
    	$("#coltop").hover(function(){
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0203.png");
    	}, function() { 
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b02.png");
    	});
    	$("#markettop").hover(function(){
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0303.png");
    	}, function() { 
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b03.png");
    	});
    	$("#membertop").hover(function(){
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0603.png");
    	}, function() { 
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0602.png");
    	});
    }
    else if(app == "column"){
    	$("#walltop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b01.png");
    	$("#coltop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0202.png");
    	$("#markettop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b03.png");
    	$("#membertop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0601.png");
    	
    	$("#walltop").hover(function(){
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0103.png");
    	}, function() { 
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b01.png");
    	});
    	$("#coltop").hover(function(){
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0203.png");
    	}, function() { 
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0202.png");
    	});
    	$("#markettop").hover(function(){
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0303.png");
    	}, function() { 
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b03.png");
    	});
    	$("#membertop").hover(function(){
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0603.png");
    	}, function() { 
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0601.png");
    	});
    }
    
    else if(app == "market"){
        $(".logoblock").css({"position":"relative" ,"top":"5px"});
        $(".logoblock2").css({"position":"relative" ,"top":"10px"});
        $(".middleblock").css({"position":"relative" ,"top":"-5px"});
        $("#walltop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b01.png");
        $("#coltop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b02.png");
        $("#markettop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0302.png");
        $("#membertop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0601.png");
        
        $("#walltop").hover(function(){
            $(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0103.png");
        }, function() { 
            $(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b01.png");
        });
        $("#coltop").hover(function(){
            $(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0203.png");
        }, function() { 
            $(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b02.png");
        });
        $("#markettop").hover(function(){
            $(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0303.png");
        }, function() { 
            $(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0302.png");
        });
        $("#membertop").hover(function(){
            $(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0603.png");
        }, function() { 
            $(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0601.png");
        });
    }
    else {
	    $("#walltop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b01.png");
    	$("#coltop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b02.png");
    	$("#markettop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b03.png");
    	$("#membertop").attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0601.png");
    	
    	$("#walltop").hover(function(){
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0103.png");
    	}, function() { 
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b01.png");
    	});
    	$("#coltop").hover(function(){
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0203.png");
    	}, function() { 
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b02.png");
    	});
    	$("#markettop").hover(function(){
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0303.png");
    	}, function() { 
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b03.png");
    	});
    	$("#membertop").hover(function(){
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0603.png");
    	}, function() { 
    		$(this).attr("src", "http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/b0601.png");
    	});
    }
});
</script>
<div>
        <div id="wrap_outer"></div>

        <div id="glideDiv0">
            <table border="0" width="100%" cellspacing="0" cellpadding="0" height="55px">
                <tr>
                    <td align="center">
                        <table border="0" width="961" cellspacing="0" cellpadding="0" height="55px" class="logoblock">
                            <tr>
                                <td align="center" width="250">
                                    <p align="left"><font size="2" face="微軟正黑體"><a href="http://<?php echo $_SERVER ['HTTP_HOST'] ?>/"><img src="http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/airstage.png" border="0" align="middle" id="logo" /></a><img src="http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/navi_white/images/nsysu.png" alt="" border="0" align="middle"></font></p>
                                </td>

                                <td align="center" width="554" valign="top" class="middleblock">
                                    <div align="left">
                                        <table border="0" width="454" cellspacing="0" cellpadding="0" height="47">
                                            <tr>
                                                <td align="center" valign="bottom">
                                                    <table border="0" width="454px" cellspacing="0" cellpadding="0" height="47px">
                                                        <tr>
                                                            <td><a href="http://<?php echo $_SERVER ['HTTP_HOST'] ?>"><img  width="86" height="35" border="0" id="walltop" /></a></td>

                                                            <td><a href="http://<?php echo $_SERVER ['HTTP_HOST'] ?>/column/"><img alt="" width="86" height="35" border="0" id="coltop" /></a></td>

                                                            <td><a href="http://<?php echo $_SERVER ['HTTP_HOST'] ?>/marketProject/marketIndex.php"><img alt="" width="86" height="35" border="0" id="markettop" /></a></td>
                                                            <td><a href="http://<?php echo $_SERVER ['HTTP_HOST'] ?>/apps/index.php"><img width="86" height="35" border="0" id="membertop"></a></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>

                                <td align="center" width="157" valign="middle" class="logoblock2">
                                    <span id="span"><?php
                                        require( "/home/airstage/public_html/global/navi_white/loginCheck.php" );
                                    ?></span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <div id="blank"></div>
    </div>