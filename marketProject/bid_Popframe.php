<div id="buyS" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<?php
			require_once("../connectVar.php");

			//判斷為"新增"或"修改"出價
			//測試資料
			$stu_id = "test01";
			$trade_id = 5;
			$isNewBid = "SELECT * FROM `marketSecondHand_bidList` WHERE `bidder_id` = '{$stu_id}' AND `trade_id` = '{$trade_id}'";
			if( $result = mysqli_query( $conn, $newBidCheck ) )
				echo "YA";
			else
				echo "NO";
			
			
			
		?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 id="myModalLabel"><?php echo (isset($check)!=1) ? "我要出價" : "修改出價" ; ?></h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action = "buyS.php" method = "post">
					<div class="control-group">
						<label class="control-label">商品編號</label>
						<div class="controls">
							<?php echo $trade_id.'<input type="hidden" name="trad_id" id="trad_id" value="'.$trade_id.'" >'; ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">商品標題</label>
						<div class="controls">
							test
							<?php
								//SQL式待更新
								$result = mysqli_query( $conn, "SELECT 'title' FROM `marketsecondhand_productinfo` WHERE `trade_id` = '{$trade_id}'" );
								$product_result = mysqli_fetch_assoc($result);
								echo $product_result['title'];
								print_r($product_result);
							?>
						</div>
					</div>
					<hr/>
					<div class="control-group">
						<label class="control-label">我要用</label>
						<div class="controls">
						<?php
							if($check) {
								switch ( $check['exchange_type'] ) {
									case 0:
										echo '<label class="checkbox inline"><input type="radio" name="exchange_type" id="exchange_type" value="0" checked="checked"/>錢　</label>'.
											 '<label class="checkbox inline"><input type="radio" name="exchange_type" id="exchange_type" value="1" />物品　</label>'.
											 '<label class="checkbox inline"><input type="radio" name="exchange_type" id="exchange_type" value="2" />錢+物品 </label>';
										break;
									case 1:
										echo '<label class="checkbox inline"><input type="radio" name="exchange_type" id="exchange_type" value="0" />錢　</label>'.
											 '<label class="checkbox inline"><input type="radio" name="exchange_type" id="exchange_type" value="1" checked="checked"/>物品　</label>'.
											 '<label class="checkbox inline"><input type="radio" name="exchange_type" id="exchange_type" value="2" />錢+物品　</label>';
										break;
									case 2:
										echo '<label class="radio inline"><input type="radio" name="exchange_type" id="exchange_type" value="0" /> 錢　</label>'.
											 '<label class="radio inline"><input type="radio" name="exchange_type" id="exchange_type" value="1" /> 物品　</label>'.
											 '<label class="radio inline""><input type="radio" name="exchange_type" id="exchange_type" value="2" checked="checked"/>錢+物品　</label>';
										break;
								}
								echo '<br/><input type="text" name="exchange_info" id="exchange_info"  value="'.$check['exchange_info'].'" />';
							}else {
						?>
								<input type="radio" name="exchange_type" id="exchange_type" value="0" />錢　
								<input type="radio" name="exchange_type" id="exchange_type" value="1" />物品　
								<input type="radio" name="exchange_type" id="exchange_type" value="2" />錢+物品　
								<br/><input type="text" name="exchange_info" id="exchange_info" />
						<?php
							}
						?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">交換</label>
						<div class="controls">
						<?php
							if($check) {
								echo '<input class="input-mini" type="text" name="wanted_number" id="wanted_number" value="'.$check['wanted_number'].'"/>個';
							}else {
								echo '<input class="input-mini" type="text" name="wanted_number" id="wanted_number"/>個';
							}
						?>
						</div>
					</div>			
					<div class="control-group">
						<div class="controls">
							<button type="submit" name="" class="btn"><?php echo (isset($check)!=1) ? "確定出價" : "修改出價" ; ?></button>
						</div>
					</div>
				</form>
			</div>
		</div>