<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SG Tech</title>
    <script src="https://kit.fontawesome.com/8c6957fe62.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="giohang.css">
    <link rel="stylesheet" href="css/homestyle.css"/>
    <link rel="stylesheet" href="css/header&footer.css"/>
</head>
    
    <header-template></header-template>
    <body>

<div class="container mt-5">
  <h1 class="text-left">Giỏ hàng</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Giá</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Tổng cộng</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody id="cart-items">
      <?php
      // Kiểm tra giỏ hàng
      if (empty($_SESSION['cart'])) {
          echo "<tr><td colspan='6'>Bạn chưa cho sản phẩm gì vào giỏ hàng!</td></tr>";
      } else {
          // Hiển thị các sản phẩm trong giỏ hàng
          foreach ($_SESSION['cart'] as $key => $item) {
              echo "<tr>";
              echo "<td>" . ($key + 1) . "</td>";
              echo "<td>" . $item['name'] . "</td>";
              echo "<td>" . $item['price'] . "</td>";
              echo "<td>" . $item['quantity'] . "</td>";
              echo "<td>" . $item['price'] * $item['quantity'] . "</td>";
              echo "<td><button class='btn btn-danger' onclick='removeItem($key)'>Xóa</button></td>";
              echo "</tr>";
          }
      }
      ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
  // Function to remove item from cart
  function removeItem(id) {
    // Send AJAX request to remove item from cart in PHP
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'remove_from_cart.php?id=' + id, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // Refresh cart display after item is removed
        document.getElementById('cart-items').innerHTML = xhr.responseText;
      }
    }
    xhr.send();
  }

  // Function to update quantity in cart
  function updateQuantity(id, quantity) {
    // Send AJAX request to update quantity in cart in PHP
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'update_cart.php?id=' + id + '&quantity=' + quantity, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // Refresh cart display after quantity is updated
        document.getElementById('cart-items').innerHTML = xhr.responseText;
      }
    }
    xhr.send();
  }
</script>

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