<?php require_once("function.php"); ?>
<?php include("header.php"); ?>
<?php

$query="SELECT idp, pret FROM cataloage WHERE pret IN (SELECT MAX(pret) FROM cataloage)";
$result=mysqli_query($connection, $query);
  if(!$result){
    die("Database query failed!");
  }
 ?>
<div class="page-content">
    <div class="container">
    	<div class="row">
         <div class="query-content clearfix col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h3 class="other-text">Piesa cea mai scumpa.</h3>
        </div>
    		<table class="table table-striped table-inverse">
    			<thead>
				    <tr>
				      <th>Id Piesa</th>
				      <th>Pret</th>
				    </tr>
  				</thead>
  				<tbody>
			    <?php 
			      while($row = mysqli_fetch_assoc($result)) { ?>
			      <tr>
			      <th scope="row"><?php echo $row["idp"]  ?></th>
			      <td> <?php echo $row["pret"]  ?></td>
			    </tr> 
			      <?php
        
      	}
    ?>    
			    <?php mysqli_free_result($result); ?>
     		</tbody>
    		</table>
    	</div>
    </div>
</div>
<?php include("footer.php"); ?>