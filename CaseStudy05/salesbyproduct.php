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
      <div id="leftcolumn" style="text-align: center;">
        <h2>Daily <br>Sales <br>Report <br><br>Product</h2>
        <a href="report.html" style="color:#340000">Go Back</a>
      </div>
      <div id="rightcolumn">
        <div class="content">
          <h2 style="margin-left: 8vw;">Sales By Product</h2>
          <div class="boxcontent">
            <table id="reporttab">
                <thead>
                    <th>Product</th>
                    <th>Total Dollar Sales</th>
                    <th>Quantity Sales</th>
                </thead>
              <tbody>
              <?php
                @ $db = new mysqli('localhost', 'root', '', 'javajam');

                if (mysqli_connect_errno()) {
                echo 'Error: Could not connect to database.  Please try again later.';
                exit;
                } 

                $query = "SELECT 
                    SUM(java_qty) as null_quantity, 
                    SUM(java_subtotal) as null_total,
                    SUM(CASE WHEN cafe_id = 2 THEN cafe_qty ELSE 0 END) as cafe_single_qty,
                    SUM(CASE WHEN cafe_id = 2 THEN cafe_subtotal ELSE 0 END) as cafe_single_total,
                    SUM(CASE WHEN cappu_id = 4 THEN cappu_qty ELSE 0 END) as cap_single_qty,
                    SUM(CASE WHEN cappu_id = 4 THEN cappu_subtotal ELSE 0 END) as cap_single_total,
                    SUM(CASE WHEN cafe_id = 3 THEN cafe_qty ELSE 0 END) as cafe_double_qty,
                    SUM(CASE WHEN cafe_id = 3 THEN cafe_subtotal ELSE 0 END) as cafe_double_total,
                    SUM(CASE WHEN cappu_id = 5 THEN cappu_qty ELSE 0 END) as cap_double_qty,
                    SUM(CASE WHEN cappu_id = 5 THEN cappu_subtotal ELSE 0 END) as cap_double_total
                FROM orders";
                $result = $db->query($query)->fetch_assoc();
                $nullqty = $result['null_quantity'];
                $nulltotal = $result['null_total'];
                $singlecafeqty = $result['cafe_single_qty'];
                $singlecafetotal = $result['cafe_single_total'];
                $singlecapqty = $result['cap_single_qty'];
                $singlecaptotal = $result['cap_single_total'];
                $doublecafeqty = $result['cafe_double_qty'];
                $doublecafetotal = $result['cafe_double_total'];
                $doublecapqty = $result['cap_double_qty'];
                $doublecaptotal = $result['cap_double_total'];
                
                $cafe_qty = $singlecafeqty + $doublecafeqty;
                $cafe_total = $singlecafetotal + $doublecafetotal;
                $cap_qty = $singlecapqty + $doublecapqty;
                $cap_total = $singlecaptotal + $doublecaptotal;

                $bestseller_product = max($cafe_total, $cap_total, $nulltotal);
                if ($bestseller_product == $cafe_total) {
                    $bestseller = "Cafe au Lait";
                    $popular_cate = max($singlecafeqty, $doublecafeqty);
                    if ($popular_cate == $singlecafeqty) {
                      if ($singlecafeqty == $doublecafeqty){
                        $popular = "Both Single & Double";
                    } else {
                        $popular = "Single";
                    }
                    } else {
                        $popular = "Double";
                    }

                } else if ($bestseller_product == $cap_total) {
                    $bestseller = "Iced Cappuccino";
                    $popular_cate = max($singlecapqty, $doublecapqty);
                    if ($popular_cate == $singlecapqty) {
                      if ($singlecapqty == $doublecapqty){
                        $popular = "Both Single & Double";
                    } else {
                        $popular = "Single";
                    }
                    } else {
                        $popular = "Double";
                    }
                } else {
                    $bestseller = "Just Java";
                    $popular = "NULL";
                }

                echo "<tr><td>Just Java</td><td><p>$$nulltotal</p></td><td>$nullqty</td></tr>";
                echo "<tr><td>Cafe au Lait</td><td><p>$$cafe_total</p></td><td>$cafe_qty</td></tr>";
                echo "<tr><td>Iced Cappuccino</td><td><p>$$cap_total</p></td><td>$cap_qty</td></tr>";
                echo "</tbody></table>";
                echo "<p style='margin-left: 7vw;'>Cafe au Lait: $singlecafeqty Single ($$singlecafetotal), $doublecafeqty Double($$doublecafetotal) </p>";
                echo "<p style='margin-left: 7vw;'>Iced Cappuccino: $singlecapqty Single ($$singlecaptotal), $doublecapqty Double($$doublecaptotal) </p>";
                echo "<p style='margin-left: 7vw;'><strong>Big Money Maker:</strong> <strong>$popular</strong> option of <strong>$bestseller</strong></p>";
                $db->close();
                ?>
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