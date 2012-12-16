<table border="0" width="99%" cellspacing="0" cellpadding="0">
					<tr>
						<td align="center" height="318px" valign="top" style="background-image:url(images/whitecolumn.png); background-repeat:no-repeat">
							<div style="position:relative; top:13px">
										<table align="center" border="0" width="892" cellpadding="5">
											<tr>
												<td width="84" align="center" rowspan="2">
												<img border="0" src="images/t1.jpg" width="61" height="52" align="middle"></td>
												<td align="center" width="359" rowspan="2" valign="top">
												<table border="0" width="359" cellspacing="0" cellpadding="0">
													<tr>
														<td style="border: 1px solid #C0C0C0" valign="middle" align="center" height="240px">
                                                            <div class="abgne-yahoo-slide abgne_tip_gallery_block2">
															<?php
															echo $topcol;
															 ?>
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
														if($secondcol != "")
														echo $secondcol;
														
														else {
															echo '<img border="0" src="images/p1.jpg" width="161px" height="104px">
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
												<td align="center" rowspan="2" valign="top" class="list">
												<p align="left" style="line-height: 150%"><br/>
												<font color="#666666" face="微軟正黑體" style="font-size: 9pt">
												<?php
													echo $col;
												?>
												</font></td>
											</tr>
											<tr>
												<td align="left" width="185" valign="bottom">
												<table border="0" width="94%" cellspacing="0" height="113">
													<tr>
														<td style="border: 1px solid #C0C0C0" align="center" align="center" valign="middle">
														<div class="abgne-yahoo-slide abgne_tip_gallery_block3">
														<?php
														if($thirdcol["rno"] != "")
														echo $thirdcol;
														
														else {
															echo '<img border="0" src="images/p1.jpg" width="161px" height="104px">
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