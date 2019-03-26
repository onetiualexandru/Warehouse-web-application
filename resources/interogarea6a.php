<?php require_once("function.php"); ?>
<?php include("header.php"); ?>
<?php

$query1="SELECT MIN(pret) AS 'pret_minim' FROM cataloage;";
$result1=mysqli_query($connection, $query1);
  if(!$result1){
    die("Database query failed!");
  }
  $query2="SELECT MAX(pret) AS 'pret_maxim' FROM cataloage;";
$result2=mysqli_query($connection, $query2);
  if(!$result2){
    die("Database query failed!");
  }

$row1 = mysqli_fetch_assoc($result1);
$row2 = mysqli_fetch_assoc($result2);
 ?>
<div class="page-content">
    <div class="container">
    	<div class="row">
        <div class="query-content clearfix col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h3 class="other-text">Pretul minim si pretul maxim din catalog, pentru fiecare piesa.</h3>
        </div>
    		<table class="table table-striped table-inverse">
    			<thead>
				    <tr>
				      <th>Pret Minim</th>
				      <th>Pret Maxim</th>
				    </tr>
  				</thead>
  				<tbody>
			      <tr>
			      <th scope="row"><?php echo $row1["pret_minim"]  ?></th>
            <th scope="row"><?php echo $row2["pret_maxim"]  ?></th>
			    </tr>     
			    <?php mysqli_free_result($result1); ?>
          <?php mysqli_free_result($result2); ?>
     		</tbody>
    		</table>
    	</div>
    </div>
</div>
<?php include("footer.php"); ?>