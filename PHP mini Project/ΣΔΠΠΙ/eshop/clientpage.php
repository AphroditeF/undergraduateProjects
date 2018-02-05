<? session_start();

	$cust=false;//αρχικοποίηση για έλεγχο πελάτη
	$poniroulis=true;
	if (isset($_POST['username']) && isset($_POST['password'])) { //έλεγχος αν ο χρήστης μας έχει δώσει όνομα χρήστη και κωδικό
				@ $db = mysql_pconnect("localhost", "root", ""); //σύνδεση με το σέρβερ
				
				if (!$db) { //αν δε βρει server
    				echo "Error: Could not connect to database. Please 	try again later.";
    				exit;
  				}
				
				mysql_select_db("cms_eshop"); //σύνδεση-επιλογή με τη ΒΔ cms_eshop
				//echo "testtt ". 
  				$query = "select * from Customers where  username='" . $_POST['username'] .  "' and password =  '" . $_POST['password'] . "'" ;// query βρες το πλήθος όσων ικανοποιούν τη συνθήκη username= το όνομα που έδωσε ο χρήστης  και κωδικός του userναμε ο κωδικός που έδωσε ο χρήστης
				
				$result = mysql_query($query);//τοποθέτηση του στη μεταβλητή result
				if(!$result) { //αν η μεταβλητή result δeν υπάρχει  τότε..
      				echo 'Δεν μπορεί να τρέξει το query!'; 
      				exit;
    			}
  				$num_results = mysql_num_rows($result);  
				if ($num_results > 0) { //αν η μεταβλητή είναι 1 τότε..δηλαδή το ζεύγος είναι σωστό
    				$_SESSION['valid_cust'] = $_POST['username'];
					$cust=true;
					$poniroulis=false;
					
					
				} 
				
				
							
	} else if(isset($_SESSION['valid_cust'])){
		//echo "valid cust ". $_SESSION['valid_cust'];
				$poniroulis=false;
				$cust=true;
	}
	else if ($poniroulis){ //αν ο χρήστης πάει να παρακάμψει τον έλεγχο του username/password πληκτρολογώντας κατευθείαν το url της σεκλίδας
		  echo"<meta http-equiv=\"Refresh\" content=\"0;url=index.php\">";
				
		  }
		  
		  ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="style1.css"  />
		<title>GREEN E</title>
 	</head>
	<body>
    
    
		<header> <!--ετικέτα html5-->
  			<a href="index.php"><img src="logo.png"  alt="logo image"  /></a>
            <? echo "<span id=\"user\">"; 
			if (isset($_SESSION['valid_cust'])) {
					
    				echo $_SESSION['valid_cust'];
					echo "<form action=\"logoutsrc.php\" method=\"post\"> 
				   			<input type=\"submit\" value=\"Αποσύνδεση\" />
						</form>"; 
			}
			echo "</span>"; ?>
             
  			 
     	</header>
        <article><div class="maindiv">
        
      <?php if(isset($_SESSION['valid_cust'])){
				 
				@ $db = mysql_pconnect("localhost", "root", ""); //σύνδεση με το σέρβερ
				if (!$db) { //αν δε βρει server
    				echo "Υπάρχει πρόβλημα με το σέρβερ, παρακαλώ προσπαθείστε ξανα αργότερα!";
    				exit;
  				}
				
				mysql_select_db("cms_eshop"); //σύνδεση-επιλογή με τη ΒΔ cms_eshop
				if(isset($_POST["product"]) and isset($_POST["stock"])){
					
					$query="UPDATE `Products` SET stock= stock - '".$_POST["stock"]."' WHERE `product`= '".$_POST["product"]."'";
					
					
					$result = mysql_query($query); 
					
					$num_results = mysql_affected_rows(); 
					
					//echo "Ο αριθμός παραγγελείας σας είναι 1". "Παραγγείλατε ".$_POST["stock"]."από το προϊόν ".$_POST["product"];			
					if($num_results==1){
						echo "Η παραγγελεία σας έχει πραγματοποιηθεί \n"; 
					}
					
					$query="INSERT INTO `Orders`( `customer`, `product`, `quantity`) VALUES ('".$_SESSION['valid_cust']."','".$_POST["product"]."','".$_POST["stock"]."')";
					//$query="INSERT INTO `Orders`( `customer`, `product_id`, `quantity`) VALUES ('','','')";
					$result = mysql_query($query);
					$num_results = mysql_affected_rows();
					if($num_results==1){
						//echo "numresults:".$num_results. "end";	
						printf("Ο αριθμός παραγγελείας σας είναι  %d\n", mysql_insert_id());
						echo "Παραγγείλατε ".$_POST["stock"]." τεμάχια  από το προϊόν ".$_POST["product"];
						
						?>
                        <form action="clientpage.php" method="POST">
                        
                        <input type="submit" value="Συνέχιση Παραγγελίας"  />
						
						
</form> <?						
						
						}		
					
				}else if(!(isset($_POST['product'])))
				{ ?>
                	<form action="clientpage.php" method="POST"> 
                  		<label>Προϊόν</label>
						<select name = "product">
				<?
							$query = "SELECT * FROM `Products` WHERE 1 ";
							$result = mysql_query($query);
							$num_results = mysql_num_rows($result);
							$records=$num_results;
							for($i=1;$i<=$records;$i++) 
							{
								$row = mysql_fetch_array($result); ?>
               					<option value = "<? echo ($row["product"]); ?>"> 
                            <?
									echo ($row["product"]); ?>
                                 </option>
               			<?  } ?>          
                        </select> 
                        <input type="submit" value="Επιλογή προϊόντος" />
                	</form>
         	 <? } 
              	else if (isset($_POST['product'])) {
					echo "Προϊόν: ". $_POST['product'] ;
  			 ?>	 <form action="clientpage.php" method="POST"> 
                    	<label>Ποσότητα:</label>
            <? 
						$query="SELECT  `stock` FROM `Products` WHERE `product`= '".$_POST['product']."'";
						$result = mysql_query($query);
						$row = mysql_fetch_array($result);
			?>
						<select name = "stock" > <?
							for($i=1;$i<=$row["stock"];$i++) {?>
                            	<option value = "<? echo $i; ?>"> 
            <?
									echo $i; ?>
                                 </option> <? } ?>
                         </select> <? 
						 if(!$result) { //αν η μεταβλητή result δeν υπάρχει  τότε..
      						echo 'Δεν μπορεί να τρέξει το query!'; 
      						exit;
    					  }
						  
			 ?>
                          <input type="hidden" name="product" value=<? echo $_POST["product"] ;?>  />
                          <input type="submit" value="Εισαγωγή Παραγγελίας" / >  
                    		
             		</form>
                      			
            <?	} //kleinei else ?>
			 
			 
			 <?
			}//kleinei if($_SESSION['valid_cust']){
				else {?>
                <h1>Παρακαλώ εισάγετε τα στοιχεία σας
			<form action="clientpage.php" method="post">
					<table>
        				<tr>
        					<td>όνομα πελάτη</td>
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
				
				
				
				<?
				}
          ?>

       
       </div> 
        </article>
            
        <hr />
 
        <footer>

			<div class="communication">Στοιχεία Επικοινωνίας: <br />Αφροδίτη Φλωρά-ct11150 <br />ct11150@ct.aegean.gr
            </div>
        	
            
            
        	
                
    </footer>	

</body>
</html>