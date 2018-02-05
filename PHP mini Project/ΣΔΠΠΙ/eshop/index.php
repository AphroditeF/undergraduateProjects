<? session_start();
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
        	<div>
  			<a href="index.php"><img src="logo.png"  alt="logo image"  /></a>
  			<span class="formdiv">
            	<h3>
    				<form action="clientpage.php" method="post">
                        <table>
                            <tr>
                                <td>Όνομα πελάτη:</td>
                                <td>Κωδικός:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="username" /></td>
                                <td><input type="password" name="password" /></td>
                                <td> <input type="submit" value="Σύνδεση" /></td>
                            </tr>
                        </table>
        			</form>
                </h3>
    		</span>
            </div>
     	</header>
        <article>
        <div class="maindiv">
        	<h1> Είστε νέος πελάτης; Εγγραφείτε τώρα!</h1>
            <h3>
            	<form action="clientreg.php" method="POST">
            		<table>
            			<tr>
        					<td>Όνομα χρήστη:</td>
        					<td><input type="text"
							 name="username" /></td>
                		</tr>
        				<tr>
        					<td>Κωδικός:</td>
        					<td><input type="password" name="password" /></td>
                		</tr>
                		<tr>
                			<td>Επίθετο:</td>
                			<td><input type="text" name="sirname" /></td>
                		</tr>
                		<tr>
                			<td>Όνομα:</td>
                    		<td><input type="text" name="name" /></td>
                		</tr>
                		<tr>
                			<td>Διεύθυνση:</td>
                    		<td><input type="text" name="address" /></td>
                		</tr>    
                		<tr> 
                    		<td></td>  
                			<td> <input type="submit" value="Εγγραφή"/></td>
        				</tr>
        			</table>
        		</form>
            </h3>
        </div>
        </article>
            
        <hr />
 
        <footer>

			<div class="communication">Στοιχεία Επικοινωνίας: <br />Αφροδίτη Φλωρά-ct11150 <br />ct11150@ct.aegean.gr
            </div>
        	
            <span class="formdiv" >
            
        	<h3>Περιοχή διαχειριστών</h3>
            <h3>
        		<form action="adminpage.php" method="post">
					<table>
        				<tr>
        					<td> username</td>
        					<td>password</td>
                			<td></td>
               			</tr>
        				<tr>
        					<td>
        						<input type="text" name="username" /> 
                			</td>
               				 <td>
                				<input type="password" name="password" /> 
                			</td>
                			<td> <input type="submit" value="Σύνδεση" />
        					</td>
        				</tr>
        			</table>
        		</form>
             </h3>
         </span>
                
    </footer>	

</body>
</html>