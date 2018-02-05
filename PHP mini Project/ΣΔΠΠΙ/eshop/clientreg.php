<? session_start();
$num_results = 0; //αρχικοποίηση μεταβλητής

if (isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['sirname'])&& isset($_POST['name'])&& isset($_POST['address'])) {
				@ $db = mysql_pconnect("localhost", "root", "");
					
				if (!$db) {
    				echo "Error: Could not connect to database. Please 	try again later.";
    				exit;
  				}
				
				mysql_select_db("cms_eshop");
  				$query = "insert into Customers values ( '".$_POST['username']."', '".$_POST['password']."','".$_POST['sirname']."','" .$_POST['name']."','".$_POST['address']."' )";
				$result = mysql_query($query);
				$num_results = mysql_affected_rows();
					}


if($num_results==6) {echo"
					<meta http-equiv=\"Refresh\" content=\"0;url=index.php\">";
				} 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="style1.css"  />
		<script language="javascript">
		</script>
		<title>GREEN E</title>
 	</head>
	<body>
    
		<header>
  			<a href="index.php"><img src="logo.png"  alt="logo image"  /></a>
            
  			 
     	
            	
    				<? 
					
				if ($num_results == 1) {
					
			echo "		<span class=\"formdiv\">
            	<h3>
    				<form action=\"clientpage.php\" method=\"post\">
                        <table>
                            <tr>
                                <td>Όνομα πελάτη:</td>
                                <td>Κωδικός:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type=\"text\" name=\"username\" /></td>
                                <td><input type=\"text\" name=\"password\" /></td>
                                <td> <input type=\"submit\" value=\"Σύνδεση\" /></td>
                            </tr>
                        </table>
        			</form>
                </h3>
    		</span> 
			
			</header>
        <article><div class=\"maindiv\">";
			echo "Έχετε εγγραφεί επιτυχώς! Κάντε login για να κάνετε την πρώτη σας παραγγελία!<br><br></div></article>";
				}
				else if ($num_results == -1) {
				echo"</header>
        <article><div class=\"maindiv\">";
					echo "<h2>Υπάρχει ήδη κάποιος χρήστης μ 'αυτό το όνομα, παρακαλώ προσπαθήστε ξανά με διαφορετικό username.</h2> 
					<form action=\"clientreg.php\" method=\"POST\">
            		<table>
            			<tr>
        					<td>Όνομα χρήστη:</td>
        					<td><input type=\"text\" name=\"username\" /></td>
                		</tr>
        				<tr>
        					<td>Κωδικός:</td>
        					<td><input type=\"text\" name=\"password\" /></td>
                		</tr>
                		<tr>
                			<td>Επίθετο:</td>
                			<td><input type=\"text\" name=\"sirname\" /></td>
                		</tr>
                		<tr>
                			<td>Όνομα:</td>
                    		<td><input type=\"text\" name=\"name\" /></td>
                		</tr>
                		<tr>
                			<td>Διεύθυνση:</td>
                    		<td><input type=\"text\" name=\"address\" /></td>
                		</tr>    
                		<tr> 
                    		<td></td>  
                			<td> <input type=\"submit\" value=\"Εγγραφή\"/></td>
        				</tr>
        			</table>
        		</form>";}
					
				
							
					 ?>
        	
        
            
        </div></article>
 <hr />
        <footer>

			<div class="communication">Στοιχεία Επικοινωνίας: <br />Αφροδίτη Φλωρά-ct11150 <br />ct11150@ct.aegean.gr
            </div>
        	
            
            
        	
                
    </footer>	

</body>
</html>