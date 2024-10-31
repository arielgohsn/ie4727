<html lang="en">
  <head>
    <link rel="stylesheet" href="styles/main.css" />
  </head>
  <body>
    <div id="wrapper">
      <header>
        <a href="admin.html">
          <img src="assets/headerlogo.png" width="500" height="100"
        /></a>
      </header>
      <div id="leftcolumn">
        <nav>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="menu.html">Menu</a></li>
            <li><a href="music.html">Music</a></li>
            <li><a href="jobs.html">Jobs</a></li>
          </ul>
        </nav>
      </div>
      <div id="rightcolumn">
        <div class="content">
          <h2 style="margin-left: 8vw;">Order Submission Page</h2>
          <div class="boxcontent">
            <table id="menutab">
              <tbody>
              <?php
              $java_qty = $_POST['java_qty'];
              $cafe_qty = $_POST['cafe_qty'];
              $cafe_selected = $_POST['cafeaulait'];
              $cappu_qty = $_POST['cappu_qty'];
              $cappu_selected = $_POST['cappuccino'];
              $java_subtotal = $_POST['java_subtotal'];
              $cafe_subtotal = $_POST['cafe_subtotal'];
              $cappu_subtotal = $_POST['cappu_subtotal'];
              $total = $_POST['total_price'];
              
              $cafe_selected == "single" ? $cafe_id = 2 : $cafe_id = 3;
              $cappu_selected == "single" ? $cappu_id = 4 : $cappu_id = 5;
                @ $db = new mysqli('localhost', 'root', '', 'javajam');

                if (mysqli_connect_errno()) {
                echo 'Error: Could not connect to database.  Please try again later.';
                exit;
                }

                $submit = "INSERT INTO orders (java_qty, java_subtotal, cafe_qty, cafe_id, cafe_subtotal, cappu_qty, cappu_id, cappu_subtotal, total) VALUES ($java_qty, $java_subtotal, $cafe_qty, $cafe_id, $cafe_subtotal, $cappu_qty, $cappu_id, $cappu_subtotal, $total)";
                $result = $db->query($submit);

                if ($result) {
                    echo "<tr><td><strong>Order Submitted! Your order is as follows:<strong></td></tr>";
                    echo "<tr><td>$java_qty of Just Java of subtotal $$java_subtotal<br>$cafe_qty of $cafe_selected shot Cafe Au Lait of subtotal $$cafe_subtotal<br>$cappu_qty of $cappu_selected shot Iced Cappuccino of subtotal $$cappu_subtotal <br></td></tr>";
                    echo "<tr><td><strong>Total Price: $$total<strong></td></tr>";
                } else {
                    echo "<tr><td>Order Submission Failed. Try again later? We still need your money!</td></tr>";}
                $db->close();
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <footer>
        <small><i>Copyright &copy; 2014 JavaJam Coffee House</i></small
        ><br />
        <small
          ><i>
            <a href="mailto:Ariel@Goh.com" style="color: #340000"
              >Ariel@GohSooNing.com</a
            >
          </i></small
        >
      </footer>
    </div>
    <script src="menuupdate.js"></script>
  </body>
</html>