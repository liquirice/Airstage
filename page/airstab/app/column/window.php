<?php
	require("../../../../conn.php");
	$total = mysqli_query($conn, "SELECT COUNT(rno) FROM Col");
	$view = mysqli_query($conn, "SELECT SUM(view) FROM Col")
?>
<!DOCTYPE HTML>
<html>
<head>
    <title></title>
    <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <style type="text/css">
/* 上方展示窗 */
    #abgneBlock {
        width: 280px;
        height: 170px;
        position: absolute;
         top: 28px;
        left: 33px;
        overflow: hidden;
        border: 1px solid #ccc;
    }
    #abgneBlock ul.list {
        padding: 0;
        margin: 0;
        list-style: none;
        position: absolute;
        width: 280px;
        height:100%;
    }
    #abgneBlock ul.list li {
        float: left;
        width: 280px;
        height: 100%;
    }
    #abgneBlock .list img{
        width: 100%;
        height: 100%;
        border: 0;
    }
    #playercontrol {
        position: absolute;
        top: 270px;
        left: 50px;
        width: 280px;
        z-index: 2;
    }
    #playercontrol ul.playerControl {
        margin: 0;
        padding: 0;
        list-style: none;
        position: absolute;
        bottom: 0px;
        right: 5px;
        height: 14px;
    }
    #playercontrol ul.playerControl li {
        float: left;
        width: 10px;
        height: 10px;
        cursor: pointer;
        margin: 0px 2px;
        background: url(images/cir_ctrl.png) no-repeat -10px 0;
    }
    #playercontrol ul.playerControl li.current { 
        background-position: 0 0;
    }
    body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
    </style>
    <script type="text/javascript" language="javascript">
$(function() {
        //展示窗jquery
        // 先取得必要的元素並用 jQuery 包裝
        // 再來取得 $block 的高度及設定動畫時間
        var $block = $('#abgneBlock'),
            $slides = $('ul.list', $block),
            $control = $('#playercontrol'),
            $player = $('ul.list', $control),
            _width = $block.width(),
            _height = $block.height(),
            $li = $('li', $slides),
            _animateSpeed = 600, 
            // 加入計時器, 輪播時間及控制開關
            timer, _showSpeed = 3000, _stop = false;

        // 產生 li 選項
        var _str = '';
        for(var i=0, j=$li.length;i<j;i++){
            // 每一個 li 都有自己的 className = playerControl_號碼
            _str += '<li class="playerControl_' + (i+1) + '"><\/li>';
        }

        // 產生 ul 並把 li 選項加到其中
        var $playerControl = $('<ul class="playerControl"><\/ul>').html(_str).appendTo($control).css('left', function(){
            // 把 .playerControl 移到置中的位置
            return (_width - $(this).width()) / 2;
        });
        
        // 幫 li 加上 click 事件
        var $playerControlLi = $playerControl.find('li').click(function(){
            var $this = $(this);
            $this.addClass('current').siblings('.current').removeClass('current');

            clearTimeout(timer);
            // 移動位置到相對應的號碼
            $slides.stop().animate({
                top: _height * $this.index() * -1
            }, _animateSpeed, function(){
                // 當廣告移動到正確位置後, 依判斷來啟動計時器
                if(!_stop) timer = setTimeout(move, _showSpeed);
            });

            return false;
        }).eq(0).click().end();

        // 如果滑鼠移入 $block 時
        $block.hover(function(){
            // 關閉開關及計時器
            _stop = true;
            clearTimeout(timer);
        }, function(){
            // 如果滑鼠移出 $block 時
            // 開啟開關及計時器
            _stop = false;
            timer = setTimeout(move, _showSpeed);
        });
        
        // 計時器使用
        function move(){
            var _index = $('.current').index();
            $playerControlLi.eq((_index + 1) % $playerControlLi.length).click();
        }
    });
    </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
    <div align="center">
        <table border="0" width="961px" cellspacing="0" cellpadding="0">
            <tr>
                <td valign="top" height="345" width="961" style="background-image: url(jpg/main.png);">
                    <div align="center" id="layer">
                        <p align="center" style="margin-top: 0; margin-bottom: 0"></p>

                        <div style="position: absolute; width: 160px; height: 61px; z-index: 1; right: 1px; top: 25px" id="layer1">
                            <table border="0" width="100%" height="17" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="8">
                                        <p style="line-height: 150%; margin-top: 0; margin-bottom: 0"><img border="0" src="jpg/brown.jpg" width="8" height="38"></p>
                                    </td>

                                    <td>
                                        <p style="line-height: 150%; margin-top: 0; margin-bottom: 0"><b><font face="微軟正黑體" size="2" color="#957C31">　文章總數：<?php while($totalnum = mysqli_fetch_array($total)){ echo "".$totalnum["COUNT(rno)"]."";} ?> 篇</font></b></p>

                                        <p style="line-height: 150%; margin-top: 0; margin-bottom: 0"><b><font face="微軟正黑體" size="2" color="#957C31">　閱讀總量：<?php while($totalview = mysqli_fetch_array($view)){ echo "".$totalview["SUM(view)"]."";} ?> 次</font></b></p>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div style="position: absolute; width: 350px; height: 213px; z-index: 2; left: 14px; top: 18px" id="layer2">
                            <table border="0" width="100%" height="228" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td background="jpg/draw.png">
                                        <p align="center"></p>

                                        <div id="abgneBlock">
                                            <ul class="list">
                                                <li><a target="_blank" href="https://www.facebook.com/NSYSUsmile"><img width="280px" height="170px" src="images/01.jpg"></a></li>

                                                <li><a target="_blank" href="https://www.facebook.com/NSYSUsmile"><img width="280px" height="170px" src="images/02.jpg"></a></li>

                                                <li><a target="_blank" href="https://www.facebook.com/NSYSUsmile"><img width="280px" height="170px" src="images/03.jpg"></a></li>

                                                <li><a target="_blank" href="https://www.facebook.com/NSYSUsmile"><img width="280px" height="170px" src="images/04.jpg"></a></li>

                                                <li><a target="_blank" href="https://www.facebook.com/NSYSUsmile"><img width="280px" height="170px" src="images/05.jpg"></a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div id="playercontrol"></div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
