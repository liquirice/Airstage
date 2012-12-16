<style type="text/css">
 #glideDiv0 {    position:fixed;
    top:0;
    left:0;
    width:100%;
    height: 55px
}
</style>
<link rel="stylesheet" type="text/css" href="http://www.airstage.com.tw/nsysu/airs/plugin/shadowbox/shadowbox.css">
<script type="text/javascript" src="http://www.airstage.com.tw/nsysu/airs/plugin/jrumble/jquery.jrumble.1.3.min.js"></script>
<script type="text/javascript" src="http://www.airstage.com.tw/nsysu/airs/plugin/shadowbox/shadowbox.js"></script>
<script>
$(function() {
	$("a").css("text-decoration", "none");
	Shadowbox.init({
		players : ['html'],
		overlayColor: "#FFFFFF",
	});
	$('#logo').jrumble({
        	x:2,
        	y:2,
        	rotation:1,
        });
        $('#logo').hover(function(){
        	$(this).trigger('startRumble'); 
        }, function(){
        	$(this).trigger('stopRumble');
        });
	if(app == "index"){
    	$("#walltop").attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0102.png");
    	$("#coltop").attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b02.png");
    	$("#markettop").attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b03.png");
    	$("#membertop").attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b05.png");
    	
    	$("#walltop").hover(function(){
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0103.png");
    	}, function() { 
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0102.png");
    	});
    	$("#coltop").hover(function(){
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0203.png");
    	}, function() { 
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b02.png");
    	});
    	$("#markettop").hover(function(){
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0303.png");
    	}, function() { 
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b03.png");
    	});
    	$("#membertop").hover(function(){
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0503.png");
    	}, function() { 
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b05.png");
    	});
    }
    else if(app == "accounts"){
    	$("#walltop").attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b01.png");
    	$("#coltop").attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b02.png");
    	$("#markettop").attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b03.png");
    	$("#membertop").attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0502.png");
    	
    	$("#walltop").hover(function(){
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0103.png");
    	}, function() { 
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b01.png");
    	});
    	$("#coltop").hover(function(){
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0203.png");
    	}, function() { 
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b02.png");
    	});
    	$("#markettop").hover(function(){
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0303.png");
    	}, function() { 
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b03.png");
    	});
    	$("#membertop").hover(function(){
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0503.png");
    	}, function() { 
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0502.png");
    	});
    }
    else if(app == "column"){
    	$("#walltop").attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b01.png");
    	$("#coltop").attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0202.png");
    	$("#markettop").attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b03.png");
    	$("#membertop").attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b05.png");
    	
    	$("#walltop").hover(function(){
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0103.png");
    	}, function() { 
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b01.png");
    	});
    	$("#coltop").hover(function(){
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0203.png");
    	}, function() { 
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0202.png");
    	});
    	$("#markettop").hover(function(){
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0303.png");
    	}, function() { 
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b03.png");
    	});
    	$("#membertop").hover(function(){
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0503.png");
    	}, function() { 
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b05.png");
    	});
    }
    else {
	    $("#walltop").attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b01.png");
    	$("#coltop").attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b02.png");
    	$("#markettop").attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b03.png");
    	$("#membertop").attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b05.png");
    	
    	$("#walltop").hover(function(){
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0103.png");
    	}, function() { 
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b01.png");
    	});
    	$("#coltop").hover(function(){
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0203.png");
    	}, function() { 
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b02.png");
    	});
    	$("#markettop").hover(function(){
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0303.png");
    	}, function() { 
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b03.png");
    	});
    	$("#membertop").hover(function(){
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b0503.png");
    	}, function() { 
    		$(this).attr("src", "http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/b05.png");
    	});
    }
    $("a").hover(function(){
    	$(this).css({"text-decoration": "underline", "font-weight" : "bold"});
    }, function() {
	    $(this).css({"text-decoration": "none", "font-weight": "100"});
    });
});
</script>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<div>
        <div id="wrap_outer"></div>

        <div id="glideDiv0" style="border: 0 solid #FFFFFF; z-index:1001; background-image:url(http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/naviback.png)">
            <table border="0" width="100%" cellspacing="0" cellpadding="0" height="55px">
                <tr>
                    <td align="center">
                        <table border="0" width="961" cellspacing="0" cellpadding="0" height="55">
                            <tr>
                                <td align="center" width="250">
                                    <p align="left"><font size="2" face="微軟正黑體"><a href="http://www.airstage.com.tw/nsysu/airs"><img src="http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/airstage.png" border="0" align="middle" id="logo" /></a><img src="http://www.airstage.com.tw/nsysu/airs/page/airstab/app/naviwhite/nsysu.png" alt="" border="0" align="middle"></font></p>
                                </td>

                                <td align="center" width="554" valign="top">
                                    <div align="left">
                                        <table border="0" width="454" cellspacing="0" cellpadding="0" height="47">
                                            <tr>
                                                <td align="center" valign="bottom">
                                                    <table border="0" width="454px" cellspacing="0" cellpadding="0" height="47px">
                                                        <tr>
                                                            <td><a href="http://www.airstage.com.tw/nsysu/airs/Ajax/activities.php"><img  width="86" height="35" border="0" id="walltop" /></a></td>

                                                            <td><a href="http://www.airstage.com.tw/nsysu/airs/Ajax/column/"><img alt="" width="86" height="35" border="0" id="coltop" /></a></td>

                                                            <td><a href="javascript:void(0)"><img alt="" width="86" height="35" border="0" id="markettop" /></a></td>
                                                            <td><a href="http://www.airstage.com.tw/nsysu/airs/accounts/revises.php"><img width="86" height="35" border="0" id="membertop"></a></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>

                                <td align="center" width="157">
                                    <div align="center">
                                        <table border="0" width="64%" cellspacing="0" cellpadding="0" height="3">
                                            <tr>
                                                <td><span style="margin-top: 0; margin-bottom: 0"><?php
                                                                                                                                                                                                                            require_once( "loginCheck.php" );
                                                                                                                                                                                                                            ?></span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
  </div>

        <div style="height:0px"></div>
    </div>