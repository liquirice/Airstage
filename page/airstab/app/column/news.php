<table border="0" width="99%" height="286" cellspacing="0" cellpadding="0">
					<tr>
						<td background="jpg/whitecolumn.png" height="286" align="center" style="background-repeat:no-repeat">
										<table border="0" width="892" cellpadding="5" height="256">
											<tr>
												<td width="84" align="center" rowspan="2">
												<img border="0" src="jpg/t03.jpg" width="59" height="50" align="middle"></td>
												<td align="center" width="359" rowspan="2">
												<table border="0" width="359" height="100%" cellspacing="0" cellpadding="0">
													<tr>
														<td style="border: 1px solid #C0C0C0">
														<p align="center">
														<img border="0" src="jpg/p1.jpg" width="349" height="232"></td>
													</tr>
												</table>
												</td>
												<td align="left" width="185" valign="top">
												<table border="0" width="93%" cellspacing="0" height="113">
													<tr>
														<td style="border: 1px solid #C0C0C0">
														<p align="center">
														<img border="0" src="jpg/t2.jpg" width="161" height="104"></td>
													</tr>
												</table>
												</td>
												<td align="center" rowspan="2">
												<p align="left" style="line-height: 150%"><br />
												<font color="#666666" face="微軟正黑體" style="font-size: 9pt">
												<?php
												while($news = mysqli_fetch_array($new)){
													echo '● <a style="color:#666666" style="font-size:9pt;" href="read.php?rno='.$news['rno'].'" target="_blank">'.$news['title'].'</a><br>';
												}
												?></font></td>
											</tr>
											<tr>
												<td align="left" width="185" valign="bottom">
												<table border="0" width="94%" cellspacing="0" height="113">
													<tr>
														<td style="border: 1px solid #C0C0C0">
														<p align="center">
														<img border="0" src="jpg/t2.jpg" width="161" height="104"></td>
													</tr>
												</table>
												</td>
											</tr>
										</table>
										</td>
					</tr>
					</table>