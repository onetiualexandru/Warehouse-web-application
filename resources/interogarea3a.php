<?php require_once("function.php"); ?>
<?php include("header.php"); ?>
<?php

$colorr = isset($_POST['colorr']) ? $_POST['colorr'] : "";

if (isset($_POST['cautare1'])) 
      {
       $result = mysqli_query($connection, 
     "call select_color('$colorr')") or die("Query fail: " . mysqli_error());
  }
       else {
         $result = mysqli_query($connection, 
     "call select_3color('maro','galben','rosu')") or die("Query fail: " . mysqli_error());
      }
 ?>
<div class="page-content">
    <div class="container">
    	<div class="row">
        <div class="query-content clearfix col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h3 class="other-text">Cautati o piesa cu culoarea dorita </h3>
        </div>
        <form action="" method="post" class="container" >
          
         <input type="text" name="colorr" value="" class="clearfix col-lg-2 col-md-2 col-sm-2 col-xs-2">
          <input type="submit" name="cautare1" value="Cauta!" class="clearfix col-lg-1 col-md-1 col-sm-1 col-xs-1">
          <input type="submit" name="cautare2" value="Afiseaza toate piesele galbene sau rosii sau maro" class="clearfix col-lg-4 col-md-6 col-sm-6 col-xs-12">
    		<table class="table table-striped table-inverse">
    			<thead>
				    <tr>
				      <th>Id Piesa</th>
				      <th>Nume Piesa</th>
				    </tr>
  				</thead>
  				<tbody>
			    <?php 
			      while($row = mysqli_fetch_assoc($result)) { ?>
			      <tr>
			      <th scope="row"><?php echo $row["idp"]  ?></th>
			      <td><?php echo $row["numep"] ?></td>
			    </tr> 
			      <?php
        
      	}
    ?>    
			    <?php mysqli_free_result($result); ?>
     		</tbody>
    		</table>
        </form>
    	</div>
    </div>
</div>
<?php include("footer.php"); ?>