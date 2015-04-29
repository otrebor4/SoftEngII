<div class='main_body'>
	<form id='add_account' method='post' accept-charset='UTF-8'>
		<table width='770px'  style = 'margin:15px 15px;  background:rgb(212, 170, 113); padding:10px '  >
			<td width='102px'>Account Name: </td>
			<td width='180px'>
			<input type='text' name='account_name' id='account_name' maxlength="255" />
			</td>
			<td width='82px'>Account #: </td>
			<td wisth='250px'> 
			<input type='text' name='account_num' id='account_num' maxlength="255" />
			<td>

			<input  id="acc_submit" type='submit' name='submit' value='add_account' />
		<?php echo $post_error_msg; ?>
		</table>
	</form>
</div>
