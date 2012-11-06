<table border="0" width="99%" cellspacing="0" cellpadding="0">
					<tr>
						<td background="jpg/whitecolumn.png" align="center" style="background-repeat:no-repeat" valign="top">
										<table border="0" width="892" cellpadding="5">
											<tr>
												<td width="84" align="center" rowspan="2">
												<img border="0" src="jpg/t04.jpg" width="35" height="53" align="middle"></td>
												<td align="center" width="359" rowspan="2" valign="top">
												<table border="0" width="359" cellspacing="0" cellpadding="0">
													<tr>
														<td style="border: 1px solid #C0C0C0" valign="top" align="center">
															<p align="center">
                                                            <div class="abgne-yahoo-slide abgne_tip_gallery_block2">
															<a target="_top" href="read.php?rno=<?php echo ''.$topcon['rno'].''; ?>">
																<?php
																if($topcon["front"] != ""){
																	echo '<img border="0" src="../../../../accounts/images/'.$topcon["stu_id"].'/col/'.$topcon["front"].'" width="349" height="232" />';
																}
																else {
																	echo '<img border="0" src="jpg/p1.jpg" width="349" height="232" />';
																}
																?>
															</a>
                                                        	<div class="title"><h3><a href="read.php?rno=<?php echo ''.$topcon['rno'].''; ?>" title=<?php echo '"'.$topcon['title'].'">'.$topcon['title'].'';?> </a></h3></div>
															<div class="desc">
																<p><span style="color:#FFF"><?php $removecon = strip_tags($topcon['realcontent']);  echo CuttingStr($removecon,100); ?></span><a href="read.php?rno=<?php echo ''.$topcon['rno'].''; ?>" target="_blank" style="cursor:pointer">更多»</a></p>
															</div>
                                                            </div></p>
        												</td>
													</tr>
												</table>
												</td>
												<td align="left" width="185" valign="top">
												<table border="0" width="93%" cellspacing="0" height="113">
													<tr>
														<td style="border: 1px solid #C0C0C0">
															<div class="abgne-yahoo-slide abgne_tip_gallery_block3">
														<?php
														if($secondcon["rno"] != ""){
														if($secondcon["front"] != "") {
															echo '<a href="read.php?rno='.$secondcon["rno"].'"><img border="0" src="../../../../accounts/images/'.$secondcon["stu_id"].'/col/'.$secondcon["front"].'" width="161px" height="104px"></a>';
														}
														else
															echo '<a href="read.php?rno='.$secondcon["rno"].'"><img border="0" src="jpg/p1.jpg" width="161px" height="104px"></a>';
														
														echo ' 
														<div class="othertitle"><h3><a href="read.php?rno='.$secondcon['rno'].'" title="'.$secondcon['title'].'">'.$secondcon['title'].'</a></h3>
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
												<td align="center" rowspan="2" valign="middle">
												<p align="left" style="line-height: 150%"><br/>
												<font color="#666666" face="微軟正黑體" style="font-size: 9pt">
                                                <?php
												while($concerts = mysqli_fetch_array($con)){
													echo '● <a style="color:#666666" style="font-size:9pt;" href="read.php?rno='.$concerts['rno'].'">'.$concerts['title'].'</a><br>';
												}
												
												?></font></td>
											</tr>
											<tr>
												<td align="left" width="185" valign="bottom">
												<table border="0" width="94%" cellspacing="0" height="113">
													<tr>
														<td style="border: 1px solid #C0C0C0">
															<div class="abgne-yahoo-slide abgne_tip_gallery_block3">
														<?php
														if($thirdcon["rno"] != ""){
														if($thirdcon["front"] != "") {
															echo '<a href="read.php?rno='.$thirdcon["rno"].'"><img border="0" src="../../../../accounts/images/'.$thirdcon["stu_id"].'/col/'.$thirdcon["front"].'" width="161px" height="104px"></a>';
														}
														else
															echo '<a href="read.php?rno='.$thirdcon["rno"].'"><img border="0" src="jpg/p1.jpg" width="161px" height="104px"></a>';
														
														echo ' 
														<div class="othertitle"><h3><a href="read.php?rno='.$thirdcon['rno'].'" title="'.$thirdcon['title'].'">'.$thirdcon['title'].'</a></h3>
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
										</td>
					</tr>
					</table>