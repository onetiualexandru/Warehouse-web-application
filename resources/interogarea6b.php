<?php require_once("function.php"); ?>
<?php include("header.php"); ?>
<?php

$query="SELECT COUNT(idf) AS 'nr_furnz',idc,cantitate FROM comenzi GROUP BY idc";
$result=mysqli_query($connection, $query);
  if(!$result){
    die("Database query failed!");
  }
 ?>
<div class="page-content">
    <div class="container">
      <div class="row">
         <div class="query-content clearfix col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h3 class="other-text">Numarul furnizorilor pentru fiecare comanda.</h3>
        </div>
        <table class="table table-striped table-inverse">
          <thead>
            <tr>
              <th>ID Comanda</th>
              <th>Cantitate</th>
              <th>Numar Furnizori</th>
				    </tr>
  				</thead>
  				<tbody>
			    <?php 
			      while($row = mysqli_fetch_assoc($result)) { ?>
			      <tr>
			      <th scope="row"><?php echo $row["idc"]  ?></th>
			      <td> <?php echo $row["cantitate"]  ?></td>
			      <td><?php echo $row["nr_furnz"] ?></td>
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