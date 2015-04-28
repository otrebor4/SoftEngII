<div class='main_body'>
	<div style = 'padding-top:15px'>
		<table width='770px' style = 'margin:0px 15px;  background:rgb(207, 163, 120);'  >
			<td align='center' style="font-size:25px" >Send Coins</td>
		</table>
		<form id='trade' method='post' accept-charset='UTF-8'>
			<table width='770px' style = 'margin:0px 15px;'  >
				<tr>
					<td style="font-size:25px" >To: </td>
					<td style="font-size:25px" >
						<input type='text' name='send_to' id='send_to' maxlength="255" />
					</td>
				</tr>
				<tr>
					<td style="font-size:25px" >Amount: </td>
					<td style="font-size:25px" >
						<input type='text' name='send_amount' id='send_amount' maxlength="255" />
					</td>
				</tr>
				<tr>
					<td style="font-size:25px" >Pay From: </td>
					<td style="font-size:25px" >
						<input type='text' name='pay_from' id='pay_from' maxlength="255" />
					</td>
				</tr>
				<tr>
					<td>
						<input class='button'  id="submit" type='submit' name='submit' value='send_coins' />
					</td>
				</tr>
			</table>
			<?php echo $post_error_msg; ?>
		</form>
	</div>

</div>