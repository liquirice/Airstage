<table border="0" width="99%" cellspacing="0" cellpadding="0">
					<tr>
						<td background="jpg/whitecolumn.png" align="center" style="background-repeat:no-repeat" valign="top">
										<table border="0" width="892" cellpadding="5">
											<tr>
												<td width="84" align="center" rowspan="2">
												<img border="0" src="jpg/t1.jpg" width="61" height="52" align="middle"></td>
												<td align="center" width="359" rowspan="2" valign="top">
												<table border="0" width="359" cellspacing="0" cellpadding="0">
													<tr>
														<td style="border: 1px solid #C0C0C0" valign="top" align="center">
															<p align="center">
                                                            <div class="abgne-yahoo-slide abgne_tip_gallery_block2">
															<a target="_top" href="read.php?rno=<?php echo ''.$topcon['rno'].''; ?>"><img border="0" src="jpg/p1.jpg" width="349" height="232"></a>
                                                        	<div class="title"><h3><a href="read.php?rno=<?php echo ''.$topcon['rno'].''; ?>" title=<?php echo '"'.$topcon['title'].'">'.$topcon['title'].'';?> </a></h3></div>
															<div class="desc">
																<a href="read.php?rno=<?php echo ''.$topcon['rno'].''; ?>" target="_blank" style="cursor:pointer"><p><?php echo left_string($topcon['realcontent'],15,"..."); ?><a href="read.php?rno=<?php echo ''.$topcon['rno'].''; ?>" target="_blank" style="cursor:pointer">更多»</a></p></a>
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
														<img border="0" src="jpg/t2.jpg" width="161" height="104"></td>
													</tr>
												</table>
												</td>
												<td align="center" rowspan="2" valign="top">
												<p align="left" style="line-height: 150%"><br/>
												<font color="#666666" face="微軟正黑體" style="font-size: 9pt">
                                                <?php
												while($concerts = mysqli_fetch_array($con)){
													echo '● <a style="color:#666666" style="font-size:9pt;" href="read.php?rno='.$concerts['rno'].'" target="_blank">'.$concerts['title'].'</a><br>';
												}
												
												?></font></td>
											</tr>
											<tr>
												<td align="left" width="185" valign="bottom">
												<table border="0" width="94%" cellspacing="0" height="113">
													<tr>
														<td style="border: 1px solid #C0C0C0">
														<img border="0" src="jpg/t2.jpg" width="161" height="104"></td>
													</tr>
												</table>
												</td>
											</tr>
										</table>
										</td>
					</tr>
					</table>