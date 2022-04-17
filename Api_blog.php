<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/filetree.css" type="text/css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/blog.css">
  </head>
  <?php
  include('connection.php');

  // get database article 
  function getArticles(){
    global $con;
    $query = "SELECT id, Image, Title, Introduction, LastMod, theme.categorie  FROM theme , article WHERE theme.IdTheme=article.IdTheme";
    $result = mysqli_query($con,$query);
    dispalyArticles($result); 
  }
  // display data article   
  function dispalyArticles($result){?>
    <div class="portfolioContent">
      <?php while($row = $result->fetch_assoc()){ ?>
        <div class="project">
          <img src="<?php echo $row['Image']; ?>"></img>	
          <h3><?php echo $row['Title'];?></h3>
          <h4><?php echo $row['Introduction'];?></h4>	
          <h5><?php echo $row['LastMod'],"&nbsp&nbsp&nbsp",$row['categorie'];?></h5>	
        </div>
      <?php }?>  
      </div> 
    <?php
  }  
  ?>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="w3-xxxlarge" href="index.php"><i class="fa fa-home"></i></a>
    </nav>
    <?php
      getArticles();
    ?>
    
  </body>
</html>


