<?php
  if($_SERVER["REQUEST_METHOD"]== "POST"){
      $usersearch = $_POST["usersearch"];
      try {
          require_once("includes/dbh.inc.php");
          $query = "SELECT * from sanpham where product_name= :usersearch or brand= :usersearch or CPU=:usersearch;";
          
          $stmt = $pdo->prepare($query);
          $stmt->bindParam(":usersearch", $usersearch);

          $stmt->execute();
        
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

          $pdo=null;
          $stmt=null;
      } catch (PDOException $e) {
          die("Đăng ký không thành công: ". $e->getMessage());
      }
  }   else{
      header("Location:../search.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SG Tech</title>
    <script src="https://kit.fontawesome.com/8c6957fe62.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/homestyle.css"/>
    <link rel="stylesheet" href="css/header&footer.css"/>
</head>
    
  <header-template></header-template>
    <body>
      <h3>Kết quả tìm kiếm</h3>
      <?php
        if(empty($results)){
          echo "<div>";
          echo "<p>Không tìm thấy kết quả</p>";
          echo "</div>";
        }
        else{
          foreach ($results as $row) {
            echo "<div>";
            echo "<h4> htmlspecialchars($row[product_name]) </h4>" ;
            echo "<p>$row[volume]</p>";
            echo "</div>";
          }
        }
      ?>
    </body>
    <footer-template></footer-template>

    <script src="js/headerandfooter.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    document.addEventListener("DOMContentLoaded", function(){
      // Get dropdowns on the page
      var dropdowns = document.querySelectorAll('.dropdown');
    
      // Add hover event to each dropdown
      dropdowns.forEach(function(dropdown) {
        dropdown.addEventListener('mouseenter', function(e) {
          var dropdownMenu = this.querySelector('.dropdown-menu');  
          if (dropdownMenu) {
            dropdownMenu.classList.add('show');
          }
        });
    
        dropdown.addEventListener('mouseleave', function(e) {
          var dropdownMenu = this.querySelector('.dropdown-menu');
          if (dropdownMenu) {
            dropdownMenu.classList.remove('show');
          }
        });
      });
    });
    </script>
</html>