<?php require_once("function.php"); ?>
<?php include("header.php"); ?>
<?php

$query="SELECT idp, numep FROM piese WHERE culoare IN('maro','galben','rosu') ORDER BY idp";
$result=mysqli_query($connection, $query);
  if(!$result){
    die("Database query failed!");
  }
 ?>
<div class="page-content">
    <div class="container">
	    <div class="row">
			<a href="furnizori.php" class="clearfix col-lg-3 col-md-3 col-sm-6 col-xs-12"><h2 class="text_menu">Interogare 3</h2></a>
			<a href="furnizori.php" class="clearfix col-lg-3 col-md-3 col-sm-6 col-xs-12"><h2 class="text_menu">Interogare 4</h2></a>
			<a href="furnizori.php" class="clearfix col-lg-3 col-md-3 col-sm-6 col-xs-12"><h2 class="text_menu">Interogare 5</h2></a>
			<a href="furnizori.php" class="clearfix col-lg-3 col-md-3 col-sm-6 col-xs-12"><h2 class="text_menu">Interogare 6</h2></a>
		</div>
    </div>
    <div class="container">
    	<div class="row">
    		<table class="table table-striped table-inverse">
    			<thead>
				    <tr>
				      <th>#</th>
				      <th>First Name</th>
				      <th>Last Name</th>
				    </tr>
  				</thead>
  				<tbody>
			    <?php 
			      while($row = mysqli_fetch_assoc($result)) { ?>
			      <tr>
			      <th scope="row"><?php echo $row["idp"]  ?></th>
			      <td> <?php echo $row["idp"]  ?></td>
			      <td><?php echo $row["numep"] ?></td>
			    </tr> 
			      <?php echo "<hr />";
        
      	}
    ?>    
			    <?php mysqli_free_result($result); ?>
     		</tbody>
    		</table>
    	</div>
    </div>
</div>
<?php include("footer.php"); ?>