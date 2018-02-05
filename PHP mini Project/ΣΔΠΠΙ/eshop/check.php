<? $admin=false;//αρχικοποίηση
	$poniroulis=true;
	if (isset($_POST['username']) && isset($_POST['password'])) { //έλεγχος αν ο χρήστης μας έχει δώσει όνομα χρήστη και κωδικό
				@ $db = mysql_pconnect("localhost", "root", ""); //σύνδεση με το σέρβερ
				
				if (!$db) { //αν δε βρει server
    				echo "Error: Could not connect to database. Please 	try again later.";
    				exit;
  				}
				
				mysql_select_db("cms_eshop"); //σύνδεση-επιλογή με τη ΒΔ cms_eshop
  				$query = "select * from Admins where  username='" . $_POST['username'] .  "' and password = '" . $_POST['password'] . "'" ;// query βρες το πλήθος όσων ικανοποιούν τη συνθήκη username= το όνομα που έδωσε ο χρήστης  και κωδικός του userναμε ο κωδικός που έδωσε ο χρήστης
				
				$result = mysql_query($query);//τοποθέτηση το στη μεταβλητή result
				if(!$result) { //αν η μεταβλητή result δeν υπάρχει  τότε..
      				echo 'Δεν μπορεί να τρέξει το query!'; 
      				exit;
    			}
  				$num_results = mysql_num_rows($result);  
				if ($num_results > 0) { //αν η μεταβλητή είναι 1 τότε..δηλαδή το ζεύγος είναι σωστό
    				$_SESSION['valid_admin'] = $_POST['username'];
					$admin=true;
					$poniroulis=false;
					
				} 
				else if ($num_results == 0){
					$_SESSION['valid_admin'] = ' ';
					$admin=false;
					$poniroulis=false;
					
				}
							
	} ?>