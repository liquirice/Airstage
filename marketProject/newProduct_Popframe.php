<script>
/*---- Category Select List start----*/
function renewList()
{
	if( cat3.options.length > 1 )
	{	
		cat3.options.length=1;
		cat3.options[0].text = "選擇分類";
	}
	cat2.options.length=1;
	cat2.options[0].text = "選擇分類";
}

function ChangeCat2()
{
	var i=1;
	var arraySize=0;
	cat2Arr = new Array();
	renewList();
	switch(document.newProductForm.cat1.value)
	{
		/*書籍雜誌*/
		case "1":
			cat2Arr[i++] = "課程用書";
			cat2Arr[i++] = "一般書籍";
			cat2Arr[i++] = "報刊雜誌";
			cat2Arr[i++] = "外文書籍";
			break;
		/*其他雜物*/
		case "2":
			cat2Arr[i++] = "服飾精品";
			cat2Arr[i++] = "美容保養";
			cat2Arr[i++] = "文具小物";
			cat2Arr[i++] = "3C產品";
			cat2Arr[i++] = "各式票券";
			cat2Arr[i++] = "家具家電";
			cat2Arr[i++] = "交通工具";
			cat2Arr[i++] = "食品";
			cat2Arr[i++] = "其他雜物";
			break;
	}
	arraySize = i;
	for(i=1; i<arraySize; i++)
	{
		cat2.options[i]=new Option( cat2Arr[i], i);
	}
	cat2.options.length=arraySize;
	cat2.selectedIndex=0;
}

function ChangeCat3()
{
	var i=1;
	var arraySize=0;
	cat3Arr = new Array();
	if( document.newProductForm.cat1.value == "1"){
		switch(document.newProductForm.cat2.value)
		{
			/*書籍雜誌-課程用書*/
			case "1":
				cat3Arr[i++] = "文學院";
				cat3Arr[i++] = "理學院";
				cat3Arr[i++] = "工學院";
				cat3Arr[i++] = "管理學院";
				cat3Arr[i++] = "海洋科學院";
				cat3Arr[i++] = "社會科學院";
				cat3Arr[i++] = "通識課程";
				cat3Arr[i++] = "其他課程";
				break;
			/*書籍雜誌-報刊雜誌*/
			case "3":
				cat3Arr[i++] = "新聞時事";
				cat3Arr[i++] = "財經企管";
				cat3Arr[i++] = "語言、文學、史地";
				cat3Arr[i++] = "科學、電腦";
				cat3Arr[i++] = "藝術、設計、攝影";
				cat3Arr[i++] = "相機攝影";
				cat3Arr[i++] = "流行時尚、影視偶像";
				cat3Arr[i++] = "旅遊、休閒、生活";
				cat3Arr[i++] = "其他雜誌";
				break;
			/*書籍雜誌-一般書籍 & 書籍雜誌-外文書籍*/
			case "2":
			case "4":
				cat3Arr[i++] = "商業理財";
				cat3Arr[i++] = "文學小說";
				cat3Arr[i++] = "藝術設計";
				cat3Arr[i++] = "人文科普";
				cat3Arr[i++] = "語言電腦";
				cat3Arr[i++] = "心靈養生";
				cat3Arr[i++] = "休閒生活";
				cat3Arr[i++] = "其他書籍";
				break;
		}
	}else if( document.newProductForm.cat1.value == "2") {
		switch(document.newProductForm.cat2.value)
		{
			/*生活雜物-服飾精品*/
			case "1":
				cat3Arr[i++] = "女性時裝";
				cat3Arr[i++] = "男性時裝";
				cat3Arr[i++] = "其他";
				break;
			/*生活雜物-美容保養*/
			case "2":
				cat3Arr[i++] = "保養用品";
				cat3Arr[i++] = "化妝用品";
				cat3Arr[i++] = "健身用品";
				cat3Arr[i++] = "清潔用品";
				cat3Arr[i++] = "其他";
				break;
			/*生活雜物-文具小物*/
			case "3":
				cat3Arr[i++] = "文具用品";
				cat3Arr[i++] = "收納整理";
				cat3Arr[i++] = "其他";
				break;
			/*生活雜物-3C產品*/
			case "4":
				cat3Arr[i++] = "電腦與周邊";
				cat3Arr[i++] = "手機與周邊";
				cat3Arr[i++] = "影音與周邊";
				cat3Arr[i++] = "其他";
				break;
			/*生活雜物-各式票券*/
			case "5":
				cat3Arr[i++] = "交通票券";
				cat3Arr[i++] = "活動票券";
				cat3Arr[i++] = "餐券禮券";
				cat3Arr[i++] = "電影票券";
				cat3Arr[i++] = "其他";
				break;
			/*生活雜物-家具家電*/
			case "6":
				cat3Arr[i++] = "電冰箱";
				cat3Arr[i++] = "廚房家電";
				cat3Arr[i++] = "其他家電";
				cat3Arr[i++] = "衛浴用品";
				cat3Arr[i++] = "各種家具";
				break;
			/*生活雜物-交通工具*/
			case "7":
				cat3Arr[i++] = "腳踏車";
				cat3Arr[i++] = "其他";
				break;
			/*生活雜物-食品*/
			case "8":
				cat3Arr[i++] = "食品";
				break;
			/*生活雜物-其他雜物*/
			case "9":
				cat3Arr[i++] = "其他";
				break;
		}
	}
	arraySize = i;
	for(i=1; i<arraySize; i++)
	{
		var value = "";
		cat3.options[i]=new Option( cat3Arr[i], i);
	}
	cat3.options.length=arraySize;
	cat3.selectedIndex=0;
}
/*prepare*/
function ChangeCat4(){}
function ChangeCat5(){}
/*---- category select end----*/
</script>

<div id="newProduct" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">刊登物品</h3>
	</div>
	<form class="form-horizontal" id="newProductForm" name="newProductForm" action = "sellS.php" method = "post" enctype = "multipart/form-data">
		<div class="modal-body">
			<div class="row">
				<div class="span1" style="padding-top:5px;"><label class="">選擇分類</label></div>
				<div class="sapn11 offset1">
					<span class="label label-info">二手市場</span> - 
					<select class="input-small" id="cat1" name="cat1" onChange="ChangeCat2();">
						<option value="">主分類</option>
						<option value="1">書籍雜誌</option>
						<option value="2">生活雜物</option>
					</select> /
					<select class="input-small" id="cat2" name="cat2" onChange="ChangeCat3();">
						<option value="">選擇分類</option>
					</select> /
					<select class="input-small" id="cat3" name="cat3" onChange="ChangeCat4();">
						<option value="">選擇分類</option>
					</select>
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="span1" style="padding-top:10px;"><label class="">物品圖片</label></div>
				<div class="sapn11 offset1">
					<input type="file" name="product_pic" id="product_pic" class="btn btn-small input-middle" value="上傳圖片" />
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="span1" style="padding-top:5px;"><label class="">商品標題</label></div>
				<div class="sapn11 offset1">
					<input class="span5" type="text" name = "title" id="title" placeholder="">
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="span1" style="padding-top:5px;"><label class="">價格數量</label></div>
				<div class="sapn11 offset1">
					每個 <input class="span1" type="text" name="least_price" id="least_price" placeholder=""> 元　/　
					共有 <input class="span1" type="text" name="number" id="number" placeholder=""> 個
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="span1" style="padding-top:5px;"><label class="">刊登時間</label></div>
				<div class="sapn11 offset1">
					至 <input class="input-small" type="text" name="end_date" id="end_date" placeholder="2012-11-08"> 
					的 <input class="span1" type="text" name="end_time" id="end_time" placeholder="14:05"> 截止
				</div>
				<!--//date("Y-m-d H:i:s");-->
			</div>
			<hr/>
			<div class="row">
				<label class="span1">物品說明</label>
				<div class="sapn11 offset1">
					<textarea class="span5" name="product_detail" id="product_detail"></textarea>
				</div>
			</div>		
		</div>
		<div class="modal-footer">
			<button class="btn btn-primary">刊登商品</button>
			<button class="btn" data-dismiss="modal">關閉視窗</button>
		</div>
	</form>
</div>	