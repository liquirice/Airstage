<table border="0" width="99%" cellspacing="0" cellpadding="0">
					<tr>
						<td background="jpg/whitecolumn.png" align="center" style="background-repeat:no-repeat" valign="top">
							<div style="position:relative; top:13px">
										<table border="0" width="892" cellpadding="5">
											<tr>
												<td width="84" align="center" rowspan="2">
												<img border="0" src="jpg/t03.jpg" width="59" height="50" align="middle"></td>
												<td align="center" width="359" rowspan="2" valign="middle">
												<table border="0" width="359" cellspacing="0" cellpadding="0">
													<tr>
														<td style="border: 1px solid #C0C0C0" valign="middle" align="center" height="240px">
                                                            <div class="abgne-yahoo-slide abgne_tip_gallery_block2">
															<a target="_top" href="read.php?rno=<?php echo ''.$topnew['rno'].''; ?>"><?php
																if($topcol["front"] != ""){
																	echo '<img border="0" src="../../../../accounts/images/'.$topnew["stu_id"].'/col/'.$topnew["front"].'" width="349" height="232" />';
																}
																else {
																	echo '<img border="0" src="jpg/p1.jpg" width="349" height="232" />';
																}
																?></a>
                                                        	<div class="title"><h3><a href="read.php?rno=<?php echo ''.$topnew['rno'].''; ?>" title=<?php echo '"'.$topnew['title'].'">'.$topnew['title'].'';?> </a></h3></div>
															<div class="desc">
																<p><span style="color:#FFF"><?php $removenew = strip_tags($topnew['realcontent']);  echo CuttingStr($removenew,100); ?></span><a href="read.php?rno=<?php echo ''.$topnew['rno'].''; ?>" target="_blank" style="cursor:pointer">更多»</a></p>
															</div>
                                                            </div>
        												</td>
													</tr>
												</table>
												</td>
												<td align="left" width="185" valign="top">
												<table border="0" width="93%" cellspacing="0" height="113">
													<tr>
														<td style="border: 1px solid #C0C0C0" align="center" valign="middle">
															<div class="abgne-yahoo-slide abgne_tip_gallery_block3">
														<?php
														if($secondnew["rno"] != ""){
														if($secondnew["front"] != "") {
															echo '<a href="read.php?rno='.$secondnew["rno"].'"><img border="0" src="../../../../accounts/images/'.$secondnew["stu_id"].'/col/'.$secondnew["front"].'" width="161px" height="104px"></a>';
														}
														else
															echo '<a href="read.php?rno='.$secondnew["rno"].'"><img border="0" src="jpg/p1.jpg" width="161px" height="104px"></a>';
														
														echo ' 
														<div class="othertitle"><h3><a href="read.php?rno='.$secondnew['rno'].'" title="'.$secondnew['title'].'">'.$secondnew['title'].'</a></h3>
														<div class="maskCss" style="height: 50px; opacity: 0.6; "></div>
														</div>';
														}
														else {
															echo '<img border="0" src="jpg/p1.jpg" width="161px" height="104px">
															<div class="othertitle"><h3 style="color:#FFFFFF">暫無文章!!!</h3>
														<div class="maskCss" style="height: 50px; opacity: 0.6; "></div>
														</div>';
														}
														?>
														</div>
														</td>
													</tr>
												</table>
												</td>
												<td align="center" rowspan="2" valign="top">
												<p align="left" style="line-height: 150%"><br/>
												<font color="#666666" face="微軟正黑體" style="font-size: 9pt">
                                                <?php
												while($news = mysqli_fetch_array($new)){
													echo '● <a style="color:#666666" style="font-size:9pt;" href="read.php?rno='.$news["rno"].'">'.CuttingStr($news['title'],30).'</a><br>';
												}
												
												?></font></td>
											</tr>
											<tr>
												<td align="left" width="185" valign="bottom">
												<table border="0" width="94%" cellspacing="0" height="113">
													<tr>
														<td style="border: 1px solid #C0C0C0" align="center" valign="middle">
															<div class="abgne-yahoo-slide abgne_tip_gallery_block3">
														<?php
														if($thirdnew["rno"] != ""){
														if($thirdnew["front"] != "") {
															echo '<a href="read.php?rno='.$thirdnew["rno"].'"><img border="0" src="../../../../accounts/images/'.$thirdnew["stu_id"].'/col/'.$thirdnew["front"].'" width="161px" height="104px"></a>';
														}
														else
															echo '<a href="read.php?rno='.$thirdnew["rno"].'"><img border="0" src="jpg/p1.jpg" width="161px" height="104px"></a>';
														
														echo ' 
														<div class="othertitle"><h3><a href="read.php?rno='.$thirdnew['rno'].'" title="'.$thirdnew['title'].'">'.$thirdnew['title'].'</a></h3>
														<div class="maskCss" style="height: 50px; opacity: 0.6; "></div>
														</div>';
														}
														else {
															echo '<img border="0" src="jpg/p1.jpg" width="161px" height="104px">
															<div class="othertitle"><h3 style="color:#FFFFFF">暫無文章!!!</h3>
														<div class="maskCss" style="height: 50px; opacity: 0.6; "></div>
														</div>';
														}
														?>
														</div>
														</td>
													</tr>
												</table>
												</td>
											</tr>
											<tr>
												<td height="40px"></td>
											</tr>
										</table>
										</div>
										</td>
					</tr>
					</table>