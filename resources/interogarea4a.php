<?php require_once("function.php"); ?>
<?php include("header.php"); ?>
<?php

$query="SELECT f.idf,f.numef,f.adresa FROM furnizori f JOIN cataloage c ON (f.idf=c.idf) JOIN piese p ON(c.idp=p.idp ) WHERE p.numep like '%e';";
$result=mysqli_query($connection, $query);
  if(!$result){
    die("Database query failed!");
  }
 ?>
<div class="page-content">
    <div class="container">
    	<div class="row">
          <div class="query-content clearfix col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h3 class="other-text">Numele furnizorilor ale caror piese se termina cu 'e'.</h3>
          </div>
    		<table class="table table-striped table-inverse">
    			<thead>
				    <tr>
				      <th>ID Furnizor</th>
				      <th>Nume Furnizor</th>
				      <th>Adresa Furnizor</th>
				    </tr>
  				</thead>
  				<tbody>
			    <?php 
			      while($row = mysqli_fetch_assoc($result)) { ?>
			      <tr>
			      <th scope="row"><?php echo $row["idf"]  ?></th>
			      <td> <?php echo $row["numef"]  ?></td>
			      <td><?php echo $row["adresa"] ?></td>
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