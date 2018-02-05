<? session_start(); //session start στην αρχή όλων των σελίδων!

	$admin=false;//αρχικοποίηση για έλεγχο admin
	$poniroulis=true;
	if(isset ($_SESSION['valid_admin']) && ($_SESSION['valid_admin']!= ' ')){
		$poniroulis=false;
		
	}
	//κώδικας για τον έλεγχο του admin
	if (isset($_POST['username']) && isset($_POST['password'])) { //έλεγχος αν ο χρήστης μας έχει δώσει όνομα χρήστη και κωδικό
				@ $db = mysql_pconnect("localhost", "root", ""); //σύνδεση με το σέρβερ
				
				if (!$db) { //αν δε βρει server
    				echo "Υπάρχει πρόβλημα με το σέρβερ, παρακαλώ προσπαθείστε ξανα αργότερα!";
    				exit;
  				}
				
				mysql_select_db("cms_eshop"); //σύνδεση-επιλογή με τη ΒΔ cms_eshop
  				$query = "select * from Admins where  username='" . $_POST['username'] .  "' and password = '" . ($_POST['password']) . "'" ;// query βρες το πλήθος όσων ικανοποιούν τη συνθήκη username= το όνομα που έδωσε ο χρήστης  και κωδικός του userναμε ο κωδικός που έδωσε ο χρήστης
				
				$result = mysql_query($query);//τοποθέτηση το στη μεταβλητή result
				if(!$result) { //αν η μεταβλητή result δeν υπάρχει  τότε..
      				echo 'Δεν μπορεί να τρέξει το query!'; 
      				exit;
    			}
  				$num_results = mysql_num_rows($result);  
				if ($num_results > 0) { //αν η μεταβλητή είναι 1 τότε.. το ζεύγος είναι σωστό
    				$_SESSION['valid_admin'] = $_POST['username'];
					$admin=true;
					$poniroulis=false;
					
				} 
				else if ($num_results == 0){ //γιατί?
					//echo "δεν υπαρχει χρήστης μ αυτό το username";//αν βάζαμε την εντολή $_SESSION['valid_admin'] = ' '; τότε θα είχαμε πρόβλημα :)
					$admin=false;
					$poniroulis=false;
					
					
				}
							
	} 



if ($poniroulis){ //αν ο χρήστης πάει να παρακάμψει τον έλεγχο του username/password πληκτρολογώντας κατευθείαν το url της σεκλίδας
		  echo"<meta http-equiv=\"Refresh\" content=\"0;url=index.php\">";
				
		  }
		  
		  ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="style1.css"  /> <!-- συνδεση με css-->
        
		<title>GREEN E</title>
 	</head>
	<body>
    
    
		<header> <!--ετικέτα html5-->
  			<a href="index.php"><img src="logo.png"  alt="logo image"  /></a>
            <? echo "<span id=\"user\">"; 
			if (isset($_SESSION['valid_admin'])) {
					
    				echo $_SESSION['valid_admin']; 
				   	echo "<form action=\"logoutsrc.php\" method=\"post\"> 
				   			<input type=\"submit\" value=\"Αποσύνδεση\" />
						</form>"; ?>
                        
                      <?  } ?>
             </div>
  			 
     	</header>
        <br />
        <!--<div class="maindiv">-->
        <article> <div class="maindiv">
        
        	 <?php if(isset($_SESSION['valid_admin'])){
			 
			 	if (isset($_POST['newproduct']) && isset($_POST['newstock'])) {
					@ $db = mysql_pconnect("localhost", "root", "");
					
					if (!$db) {
    					echo "Error: Could not connect to database. Please 	try again later.";
    					exit;
  					}
				
					mysql_select_db("cms_eshop");
							
  					$query = "insert into Products (product,stock) values ('".$_POST['newproduct']."', ".$_POST['newstock'].")";
					$result = mysql_query($query);
					$num_results = mysql_affected_rows();
							
					if ($num_results==1){
						echo "<h1>Ενημέρωση των αποθεμάτων έγινε. Από το προίόν"; 
						$query="SELECT * FROM cms_eshop.Products WHERE product=".$_POST['newproduct']."";
						echo " ".$_POST['newproduct']." έχετε ".$_POST['newstock']." τεμάχια.";
					}
							?> 
					<form action="adminpage.php" method="post">
                    	<input name="" type="submit" value="Επιστροφή στην κεντρική οθόνη διαχειριστή" />
                    </form>
							<?
							
			   	}
						else if (isset($_POST['product']) && isset($_POST['stock'])) {
							
							//kwdikas gia enhmerwsh proiontos
							
							@ $db = mysql_pconnect("localhost", "root", "");
					
							if (!$db) {
    							echo "Error: Could not connect to database. Please 	try again later.";
    							exit;
  							}
				
							mysql_select_db("cms_eshop");
							
							if($_POST['calculator']=="addition") {
  		
								$query="UPDATE `Products` SET stock= stock + '".$_POST['stock']."' WHERE `product`= '".$_POST['product']."'";
		
							}else if($_POST['calculator']=="equal") {
								$query="UPDATE `Products` SET stock='".$_POST['stock']."' WHERE `product`= '".$_POST['product']."'";
								}
								else if($_POST['calculator']=="subtraction" ){
								 $query="UPDATE `Products` SET stock= stock - '".$_POST['stock']."' WHERE `product`= '".$_POST['product']."'";
								 }
 								$result = mysql_query($query);
								$num_results = mysql_affected_rows();
								
								if($num_results==1){
									$query="SELECT  `stock` FROM `Products` WHERE `product`= '".$_POST['product']."'";
									 
									$result = mysql_query( $query );   
									  
									
									$row = mysql_fetch_array($result);
									
									
									
									echo "Η ενημέρωση έγινε επιτυχώς! Από το προϊόν ".$_POST['product']. " έχετε συνολικά ".$row["stock"]. "!"; ?>
									<form action="adminpage.php" method="get"> 
										<input type="submit" value="ok" />
									</form>
									<?

								}
							
							
							
							
							}
						else { ?>
        					<form action="adminpage.php" method="POST">
            					Προϊόν: <input type="text" name="newproduct" />
                        		Ποσότητα:<input type="text" name="newstock" />
                        		<input type="submit" value="Εισαγωγή νέου προϊόντος"/>       			
                    		</form> 
                    
                    		<form action="adminpage.php" method="POST"> <? //forma update proiontos ?>
                    			<label>Προϊόν</label>
								<select name = "product">
							<?
							@ $db = mysql_pconnect("localhost", "root", ""); //σύνδεση με το σέρβερ
				
				if (!$db) { //αν δε βρει server
    				echo "Υπάρχει πρόβλημα με το σέρβερ, παρακαλώ προσπαθείστε ξανα αργότερα!";
    				exit;
  				}
				
				mysql_select_db("cms_eshop"); //σύνδεση-επιλογή με τη ΒΔ cms_eshop
								
								$query = "SELECT * FROM `Products` WHERE 1 ";
								//echo $query;
								$result = mysql_query($query);
								//echo $result;
								$num_results = mysql_num_rows($result);
								//echo $num_results;
								$records=$num_results;
								//echo $records;
								//$records=5;
								for($i=1;$i<=$records;$i++) {
							?>
             			 <? $row = mysql_fetch_array($result); ?>
               						<option value = "<? echo ($row["product"]); ?>"> 
                                   <?
										echo ($row["product"]); ?>
                                      </option>
               					<? } ?>          
                                   			</select>
                                            
                                            
                                           
                                      <select name="calculator">
                                      <option value = "addition"> 
                              				+
                                      </option>
                                      <option value = "subtraction"> 
                              				-
                                      </option>
                                      <option value = "equal"> 
                              				=
                                      </option>
                                      </select>
                                            
                                  Ποσότητα:<input type="text" name="stock" />
                                  
                        			<input type="submit" value="Ενημέρωση  υπάρχοντος προϊόντος"/>  
                    		</form>
                        <? } ?>
         
			
        	
        <? } else { ?> 
        <h1>Παρακαλώ εισάγετε τα στοιχεία σας
			<form action="adminpage.php" method="post">
					<table>
        				<tr>
        					<td>όνομα διαχειριστή</td>
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
            <? } ?>
            
        
       
        <hr />
        </div>
        </article>
<footer>

	<div class="communication"><h2>Στοιχεία Επικοινωνίας:</h2> <br /><h3>Αφροδίτη Φλωρά-ct11150 <br />ct11150@ct.aegean.gr
            </h3></div>    
    </footer>	

</body>
</html>