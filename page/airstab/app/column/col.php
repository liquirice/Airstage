<table border="0" width="99%" cellspacing="0" cellpadding="0">
					<tr>
						<td align="center" height="318px" valign="top" style="background-image:url(jpg/whitecolumn.png); background-repeat:no-repeat">
							<div style="position:relative; top:13px">
										<table align="center" border="0" width="892" cellpadding="5">
											<tr>
												<td width="84" align="center" rowspan="2">
												<img border="0" src="jpg/t1.jpg" width="61" height="52" align="middle"></td>
												<td align="center" width="359" rowspan="2" valign="top">
												<table border="0" width="359" cellspacing="0" cellpadding="0">
													<tr>
														<td style="border: 1px solid #C0C0C0" valign="middle" align="center" height="240px">
                                                            <div class="abgne-yahoo-slide abgne_tip_gallery_block2">
															<a target="_top" href="read.php?rno=<?php echo ''.$topcol['rno'].''; ?>">
															<?php
																if($topcol["front"] != ""){
																	echo '<img border="0" src="../../../../accounts/images/'.$topcol["stu_id"].'/col/'.$topcol["front"].'" width="349px" height="232px">';
																}
																else {
																	echo '<img border="0" src="jpg/p1.jpg" width="349px" height="232px">';
																}
																?>
																</a>
                                                        	<div class="title"><h3><a href="read.php?rno=<?php echo ''.$topcol['rno'].''; ?>" title=<?php echo '"'.$topcol['title'].'">'.$topcol['title'].'';?> </a></h3></div>
															<div class="desc">
																<p><span style="color:#FFF"><?php $removecol = strip_tags($topcol['realcontent']);  echo CuttingStr($removecol,100); ?></span><a href="read.php?rno=<?php echo ''.$topcol['rno'].''; ?>" target="_blank" style="cursor:pointer">更多»</a></p>
															</div>
                                                            </div>
        												</td>
													</tr>
												</table>
												</td>
												<td align="left" width="185" valign="top">
												<table border="0" width="93%" cellspacing="0" height="113">
													<tr>
														<td style="border: 1px solid #C0C0C0" valign="middle" align="center">
														<div class="abgne-yahoo-slide abgne_tip_gallery_block3">
														<?php
														if($secondcol["rno"] != ""){
														if($secondcol["front"] != "") {
															echo '<a href="read.php?rno='.$secondcol["rno"].'"><img border="0" src="../../../../accounts/images/'.$secondcol["stu_id"].'/col/'.$secondcol["front"].'" width="161px" height="104px"></a>';
														}
														else
															echo '<a href="read.php?rno='.$secondcol["rno"].'"><img border="0" src="jpg/p1.jpg" width="161px" height="104px"></a>';
														
														echo ' 
														<div class="othertitle"><h3><a href="read.php?rno='.$secondcol['rno'].'" title="'.$secondcol['title'].'">'.$secondcol['title'].'</a></h3>
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
												while($column = mysqli_fetch_array($col)){
													echo '● <a style="color:#666666" style="font-size:9pt;" href="read.php?rno='.$column['rno'].'">'.CuttingStr($column['title'],30).'</a><br>';
												}
												
												?></font></td>
											</tr>
											<tr>
												<td align="left" width="185" valign="bottom">
												<table border="0" width="94%" cellspacing="0" height="113">
													<tr>
														<td style="border: 1px solid #C0C0C0" align="center" align="center" valign="middle">
														<div class="abgne-yahoo-slide abgne_tip_gallery_block3">
														<?php
														if($thirdcol["rno"] != ""){
														if($thirdcol["front"] != "") {
															echo '<a href="read.php?rno='.$thirdcol["rno"].'"><img border="0" src="../../../../accounts/images/'.$thirdcol["stu_id"].'/col/'.$thirdcol["front"].'" width="161px" height="104px"></a>';
														}
														else
															echo '<a href="read.php?rno='.$thirdcol["rno"].'"><img border="0" src="jpg/p1.jpg" width="161px" height="104px"></a>';
														
														echo ' 
														<div class="othertitle"><h3><a href="read.php?rno='.$thirdcol['rno'].'" title="'.$thirdcol['title'].'">'.$thirdcol['title'].'</a></h3>
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