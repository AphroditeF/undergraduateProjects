
				
				<?php 
				session_start();
					unset($_SESSION['valid_cust']); 
					session_destroy(); 
				?>
				<h1>Έχετε αποσυνδεθεί επιτυχώς!!!</h1>
                <h2>Σε 5 δευτερόλεπτα θα κατευθυνθείτε στην αρχική σελίδα</h2>
			<? echo"<meta http-equiv=\"Refresh\" content=\"5;url=index.php\">"; ?>