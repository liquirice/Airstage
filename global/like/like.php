<?php
//require_once("../connectVar.php");
$selectmember = mysqli_query($conn, "SELECT * FROM member_Info WHERE stu_id='".$_SESSION["stu_id"]."' LIMIT 1");
$resultmember = mysqli_fetch_array($selectmember);
$selectcol = mysqli_query($conn, "SELECT * FROM Col WHERE rno=".$_GET["rno"]." LIMIT 1");
$likecol = mysqli_fetch_array($selectcol);
$memberlike=explode(",", $resultmember['like']);
$i=0;
$j=0;

if($like == "column"){
    while($memberlike[$i] != ''){
        if(substr($memberlike[$i], 0,3)=="col"){
            $collike = explode("_",$memberlike[$i]);
            if($collike[1] == $likecol["rno"]){
                $j++;
            }
        }
        $i++;
    }
    if($j!=0){
        $likeclass = "liked";
        $src="like03";
    }
    else{
        $likeclass = "like";
        $src="like01";
    }
}

?>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER["HTTP_HOST"] ?>/global/like/css/like.css" />
<script language="javascript" type="text/javascript" src="http://<?php echo $_SERVER["HTTP_HOST"] ?>/global/like/js/like.js"></script>
<div style="width: 123px; height:50px">
    <div style="width:74px; height: 50px; float: left; background-image: url(http://<?php echo $_SERVER["HTTP_HOST"] ?>/global/like/image/like_left.png); font-size:15px" align="center"><p id="likenum"><?php echo $likecol["like"] ?></p></div>
    <?php
        echo "
        <div id='likeId' class='".$likeclass."'></div>";
    ?>
</div>