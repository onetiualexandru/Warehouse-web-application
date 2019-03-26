<?php require_once("function.php"); ?>
<?php include("header.php"); ?>
<?php

$colorr = isset($_POST['colorr']) ? $_POST['colorr'] : "";

if (isset($_POST['cautare1'])) 
      {
       $result = mysqli_query($connection, 
     "call search_color('$colorr')") or die("Query fail: " . mysqli_error());
  }
 ?>
<div class="page-content">
    <div class="container">
      <div class="row">
        <div class="query-content clearfix col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h3 class="other-text">Introduce-ti culoarea piesei dorite</h3>
        </div>
        <form action="" method="post" class="container" >
          <input type="text" name="colorr" value="" class="clearfix col-lg-2 col-md-2 col-sm-2 col-xs-2">
          <input type="submit" name="cautare1" value="Cauta!" class="clearfix col-lg-1 col-md-1 col-sm-1 col-xs-1">
        <table class="table table-striped table-inverse">
          <thead>
            <tr>
              <th>Id Piesa</th>
              <th>Nume Piesa</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          if (isset($_POST['cautare1'])) 
            while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <th scope="row"><?php echo $row["idf"]  ?></th>
            <td><?php echo $row["numef"] ?></td>
          </tr> 
            <?php
        
        }
    ?>    
        </tbody>
        </table>
        </form>
      </div>
    </div>
</div>
<?php include("footer.php"); ?>