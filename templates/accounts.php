<div class='main_body'>
	
	<div style = 'padding-top:15px'>

		<?php
			$accounts = get_accounts($conn);
			$count = count($accounts);
			$i = 0;
			while( $i < $count){
				echo "<table width='770px' style = 'margin:0px 15px;  background:cadetblue;'  >";

				echo "<td width='110px'>Account Name: </td>";
				echo "<td width='130px'>".$accounts[$i]['acc_name'] ."</td>";

				echo "<td width='75px'>Account #: </td>";
				echo "<td width='190px'> " . $accounts[$i]['acc_num'] . "</td>";

				echo "<td width='65px'>Balance:</td>";
				echo "<td width='130px'>".$accounts[$i]['acc_balance'] ."</td>";
				echo "</table>";
				$i++;
				$transactions = get_transactions($conn, $accounts[i]['acc_num']);

				$tcount = count($transactions);
				if($tcount > 0){

				}else{
					echo "<table width='770px' style = 'margin:0px 15px;  background:white;'  >";
					echo "<td> NO transactions </td>";
					echo "</table>";
				}
			}
			//just draw empty table
			if($count == 0){
				echo "<table width='770px' style = 'margin:0px 15px;  background:cadetblue;'  >";
				echo "<td width='110px'>Account Name: </td>";
				echo "<td width='130px'></td>";
				echo "<td width='65px'>Account #: </td>";
				echo "<td width='190px'> </td>";
				echo "<td width='65px'>Balance:</td>";
				echo "<td width='130px'></td>";
				echo "</table>";
			}
		?>
		<div width='770px' style = 'margin:0px 15px;  background:white;'  >
		<a class = 'button' href="?action=add_account">Add Account</a>
		</div>
	</div>
</div>