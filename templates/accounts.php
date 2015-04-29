<div class='main_body'>
	
	<div style = 'padding-top:15px'>

		<?php
			$accounts = get_accounts($conn);
			$count = count($accounts);
			$i = 0;
			while( $i < $count){
				echo "<table width='770px' style = 'margin:0px 15px;  background:rgb(163, 117, 71);'  >";

				echo "<td width='110px'>Account Name: </td>";
				echo "<td width='130px'>".$accounts[$i]['acc_name'] ."</td>";

				echo "<td width='75px'>Account #: </td>";
				echo "<td width='190px'> " . $accounts[$i]['acc_num'] . "</td>";

				echo "<td width='65px'>Balance:</td>";
				echo "<td width='130px'>".$accounts[$i]['acc_balance'] ."</td>";
				echo "</table>";
				
				$transactions = get_transactions($conn, $accounts[$i]['acc_num']);

				echo "<table width='770px' style = 'margin:0px 15px;  background:rgb(207, 163, 120);'  >";
				echo "<td width='150px'>Time</td>";
				echo "<td width='150px'>Transaction Type</td>";
				echo "<td width='150px'>From/To </td>";
				echo "<td width='150px'>Ammount</td>";
           		echo "</table>";


           		$tcount = count($transactions);
           		$j = 0;
				while($j < $tcount)
				{
					$odd_c = "rgb(207, 163, 120)";
					$even_c= "rgb(178, 154, 131)";

					echo "<table width='770px' style = 'margin:0px 15px; background:". (($j%2==0) ? $even_c : $odd_c) .";'  >";
					echo "<td width='150px'>" . $transactions[$j]['time'] . "</td>";
					echo "<td width='150px'>" . $transactions[$j]['type'] . "</td>";
					echo "<td width='150px'>" . $transactions[$j]['other'] . "</td>";
					echo "<td width='150px'>" . $transactions[$j]['ammount'] . "</td>";
            		echo "</table>";
            		$j++;
				}
				if($tcount == 0){
					echo "<table width='770px' style = 'margin:0px 15px; background:rgb(178, 154, 131) ;'  >";
					echo "<td width='150px'> No transactions.</td>";
					echo "</table>";
				}

				echo "<table width='770px' style = 'margin:2px 15px;'  >";
				echo "<td width='150px'></td>";
				echo "</table>";

				$i++;
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