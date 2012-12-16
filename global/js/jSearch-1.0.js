/************************/
/* Dependencies: jSearchQuery.php, jQuery library
/* Usage: Ajax live search query request
/* Developer: bryantung89@gmail.com
/* Modified: N/A
/* Change log: N/A
/************************/

$.fn.jSearchFactory = function(search){
	window.xhr;
	var input = $(this).find('input');
	var result = $('<div id="qResult" class="search_result_area"></div>');
	result.appendTo($(this));
	input.on({
		'keyup.jsearch, change.jsearch':function(e){
			if ($.trim(input.val()).length==0) {
				if (window.xhr && window.xhr.readyState!=4) window.xhr.abort();
				$('#qResult').fadeOut('fast',function(){
					$('#qResult').html('');
					$('.jshide').fadeIn();
				});
			} else {
				input.jSearch(search,input.val());
			}
		}
	});
	var ulKey = $(this).find('ul');
	ulKey.addClass('jskey');
	$('<li key="null" class="jskeyclear">清除分類</li>').appendTo(ulKey).hide();
	ulKey.find('li').each(function(){
		$(this).hover(function(){
			$(this).css({'text-decoration':'underline','color':'#C00'});
		},function(){
			$(this).css({'text-decoration':'','color':''});
		});
		$(this).click(function(){
			$(this).jSearchKey(search);
		});
	});
};

$.fn.jSearch = function(s,q){
	q = encodeURIComponent($.trim(q));
	var dataString = "s="+s+"&q="+q;
	if (window.xhr && window.xhr.readyState!=4) window.xhr.abort();
	window.xhr = $.ajax({
		url:'/nsysu/airs/model/jSearchQuery.php',
		type:'POST',
		dataType:'json',
		data:dataString,
		success:function(data){
			$('.jshide').fadeOut('fast',function(){
				$('#qResult').fadeIn();
			});
			if (data.length==0) {
				$('#qResult').html('<div align="center" class="jsearch_response_dialog"><p>無查詢結果: '+decodeURIComponent(q)+'<br>No results found: '+decodeURIComponent(q)+'</p></div>');
			} else {
				$('#qResult').html('<div align="center" class="jsearch_response_dialog">'+data.length+'個查詢結果: '+decodeURIComponent(q)+'<br>'+data.length+' results found: '+decodeURIComponent(q)+'</div>');
				for (var newE in data) {
					$(data[newE]).appendTo($("#qResult"));
				}
			}
		}
	});
};

$.fn.jSearchKey = function(s){
	if ($(this).attr('key')=="null") {
		$(this).hide();
		$('#qResult').fadeOut('fast',function(){
			$('#qResult').html('');
			$('.jshide').fadeIn();
		});
		return;
	}
	if ($(this).attr('jstype')=='cat') {
		var key = $(this).attr('key');
		var dataString = "s="+s+"&k="+key;
		var keyTitle = $(this).html();
		$(this).siblings('li.jskeyclear').show();
		$.ajax({
			url:'/nsysu/airs/model/jSearchQuery.php',
			type:'POST',
			dataType:'json',
			data:dataString,
			success:function(data){
				$('.jshide').fadeOut('fast',function(){
					$('#qResult').fadeIn();
				});
				if (data.length==0) {
					$('#qResult').html('<div align="center" class="jsearch_response_dialog"><p>暫無 '+keyTitle+' 的結果</p></div>');
				} else {
					$('#qResult').html('<div align="center" class="jsearch_response_dialog">'+keyTitle+'</div>');
					for (var newE in data) {
						$(data[newE]).appendTo($("#qResult"));
					}
				}
			}
		});
	}
};