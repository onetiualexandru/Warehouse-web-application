<?php require_once("function.php"); ?>
<?php include("header.php"); ?>
<?php

$query="SELECT DISTINCT p1.idp,c1.pret FROM cataloage c1 JOIN piese p1 ON (c1.idp=p1.idp) JOIN cataloage c2 ON (c1.pret=c2.pret) JOIN piese p2 ON (c2.idp=p2.idp) WHERE c1.pret=c2.pret AND c1.idf!=c2.idf ORDER BY p1.idp";
$result=mysqli_query($connection, $query);
  if(!$result){
    die("Database query failed!");
  }
 ?>
<div class="page-content">
    <div class="container">
    	<div class="row">
         <div class="query-content clearfix col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h3 class="other-text">Perechile de coduri de piese unice, care sunt furnizate la acelasi pret de furnizori diferiti.</h3>
        </div>
    		<table class="table table-striped table-inverse">
    			<thead>
				    <tr>
				      <th>Id Piesa</th>
				      <th>First Name</th>
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