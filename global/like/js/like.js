$(document).ready(function(){
	$("#likeId").hover(function() {
		if ($(this).hasClass('like')) $(this).addClass("likehover");
		else $(this).addClass("likedhover");
	}, function() {
		if ($(this).hasClass('like')) $(this).removeClass("likehover");
		else $(this).removeClass("likedhover");
	});
	
	$('#likeId').on('click.like',function(){
		var liked = $(this).hasClass('liked');
		if (liked) {
			$.ajax({
				type:"POST",
				url:"http://www.airstage.com.tw/global/like/update.php",
				data:{rno:rno, app:app, type:"liked"},
				success: function(data){
					if(data == "你已取消推過此文,請求無法完成!"){
						alert(data);
					}
					else{
						$("#likenum").text(data);
						$(".liked").addClass('like').removeClass('liked likedhover');
					}
				}
			})
		} else {
			$.ajax({
				type:"POST",
				url:"http://www.airstage.com.tw/global/like/update.php",
				data:{rno:rno, app:app, type:"like"},
				success: function(data){
					if(data == "你已推過此文,請求無法完成!"){
						alert(data);
					}
					else{
						$("#likenum").text(data);
						$(".like").addClass('liked').removeClass('like likehover');
					}
				}
			})
		}
	});
})
