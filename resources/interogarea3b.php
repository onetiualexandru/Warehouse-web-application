<?php require_once("function.php"); ?>
<?php include("header.php"); ?>
<?php

if (isset($_POST['cautare1'])) 
      {
       $result = mysqli_query($connection, 
     "call select_pret(0,150)") or die("Query fail: " . mysqli_error());
  }
      else  if (isset($_POST['cautare2'])) {
         $result = mysqli_query($connection, 
     "call select_pret(150,200)") or die("Query fail: " . mysqli_error());
      }
       else  if (isset($_POST['cautare3'])) {
         $result = mysqli_query($connection, 
     "call select_pret(200,1000)") or die("Query fail: " . mysqli_error());
      }
       else {
         $result = mysqli_query($connection, 
     "call select_pret(0,1000)") or die("Query fail: " . mysqli_error());
      }
 ?>
<div class="page-content">
    <div class="container">
    	<div class="row">
        <form action="" method="post" class="container" >
          <input type="submit" name="cautare1" value="Pret: 0 - 150" class="clearfix col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <input type="submit" name="cautare2" value="Pret: 150 - 200" class="clearfix col-lg-2 col-md-6 col-sm-6 col-xs-12">
          <input type="submit" name="cautare3" value="Pret: 200 - 1000" class="clearfix col-lg-2 col-md-6 col-sm-6 col-xs-12">
          <input type="submit" name="cautare4" value="Pret: 0 - 1000" class="clearfix col-lg-3 col-md-6 col-sm-6 col-xs-12">
    		<table class="table table-striped table-inverse">
    			<thead>
				    <tr>
				      <th>ID Furnizor</th>
				      <th>ID Piesa</th>
              <th>Pret</th>
              <th>Nume piesa</th>
				    </tr>
  				</thead>
  				<tbody>
			    <?php 
			      while($row = mysqli_fetch_assoc($result)) { ?>
			      <tr>
			      <th scope="row"><?php echo $row["idf"]  ?></th>
			      <td><?php echo $row["idp"] ?></td>
            <td><?php echo $row["pret"] ?></td>
            <td><?php echo $row["moneda"] ?></td>
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