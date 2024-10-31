<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="styles/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  </head>
  <body onload="updatePrices()">
    <div id="wrapper">
      <header>
        <img src="assets/headerlogo.png" width="500" height="100" />
      </header>
      <div id="leftcolumn" style="text-align: center;">
        <h2>Product <br>Price <br>Update</h2>
        <a href="admin.html" style="color:#340000">Cancel</a>
      </div>
      <div id="rightcolumn">
        <div class="menucontent">
          <h2>Coffee Prices at JavaJam</h2>
          <div class="boxcontent">
            <table id="menutab">
              <tbody>
                <tr>
                  <td><button onclick="updateJava()">Update</button></td>
                  <td><h4>Just Java</h4></td>
                  <td>
                    Regular house blend, decaffeinated coffee, or flavor of the
                    day <br />
                    <strong>Endless Cup $</strong><strong id="javaPrice">2.00</strong>
                  </td>
                </tr>
                <tr>
                  <td><button onclick="updateCafe()">Update</button></td>
                  <td><h4>Cafe au Lait</h4></td>
                  <td>
                    House blended coffee infused into a smooth, steamed milk<br />
                    <strong>Single $</strong><strong id="cafeSinglePrice">2.00</strong>
                    <input type="radio" checked="checked" id="cafe_single" name="cafeaulait" value="single"/>
                    <strong>Double $</strong><strong id="cafeDoublePrice">3.00</strong>
                    <input type ="radio" id="cafe_double" name="cafeaulait" value="double"/>
                  </td>
                </tr>
                <tr>
                  <td><button onclick="updateCapp()">Update</button></td>
                  <td><h4>Iced Cappuccino</h4></td>
                  <td>
                    Sweetened espresso blended with icy-cold milk and served in
                    a chilled glass<br />
                    <strong>Single $</strong><strong id="capSinglePrice">4.75</strong>
                    <input type="radio" checked="checked" id="cappuccino_single" name="cappuccino" value="single"/>
                    <strong>Double $</strong><strong id="capDoublePrice">5.75</strong>
                    <input type ="radio" id="cappuccino_double" name="cappuccino" value="double"/>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <footer>
        <small><i>Copyright &copy; 2014 JavaJam Coffee House</i></small
        ><br />
        <small
          ><i
            ><a href="mailto:Ariel@Goh.com" style="color: #340000"
              >Ariel@GohSooNing.com</a
            ></i
          ></small
        >
      </footer>
    </div>
    <script>
      async function updateJava() {
        newPrice = prompt(`Enter the new price for Just Java:`);
        menu_id = 1;
        price_id = "javaPrice";

        try {
          const priceResult = await $.ajax({
            url: "update_price.php",
            type: "POST",
            dataType: "json",
            data: { id: menu_id, price: newPrice },
          });
          console.log(priceResult);

          if (priceResult === "success") {
            alert(priceResult.message);
          } else {
            alert(priceResult.message);
          }
          const getResult = await $.ajax({
            url: "get_price.php",
            type: "POST",
            dataType: "json",
            data: { id: menu_id },
          });
          if (getResult.status === 'success') {
            document.getElementById(price_id).innerHTML = getResult.price;
          }
        } catch (error) {
          console.log(error);
        }
      }

      async function updateCafe() {
        newPrice = prompt(`Enter the new price for Cafe au Lait:`);
        shot = document.querySelector('input[name="cafeaulait"]:checked').value;

        if (shot == "single") {
          menu_id = 2;
          price_id = "cafeSinglePrice";
        } else {
          menu_id = 3;
          price_id = "cafeDoublePrice";
        }
        try {
          const priceResult = await $.ajax({
            url: "update_price.php",
            type: "POST",
            dataType: "json",
            data: { id: menu_id, price: newPrice },
          });
          console.log(priceResult);

          if (priceResult === "success") {
            alert(priceResult.message);
          } else {
            alert(priceResult.message);
          }
          const getResult = await $.ajax({
            url: "get_price.php",
            type: "POST",
            dataType: "json",
            data: { id: menu_id },
          });
          if (getResult.status === 'success') {
            document.getElementById(price_id).innerHTML = getResult.price;
          }
        } catch (error) {
          console.log(error);
        }
      }

      async function updateCapp() {
        newPrice = prompt(`Enter the new price for chosen Iced Cappuccino:`);
        shot = document.querySelector('input[name="cappuccino"]:checked').value;

        if (shot == "single") {
          menu_id = 4;
          price_id = "capSinglePrice";
        } else {
          menu_id = 5;
          price_id = "capDoublePrice";
        }
        try {
          const priceResult = await $.ajax({
            url: "update_price.php",
            type: "POST",
            dataType: "json",
            data: { id: menu_id, price: newPrice },
          });
          console.log(priceResult);

          if (priceResult === "success") {
            alert(priceResult.message);
          } else {
            alert(priceResult.message);
          }
          const getResult = await $.ajax({
            url: "get_price.php",
            type: "POST",
            dataType: "json",
            data: { id: menu_id },
          });
          if (getResult.status === 'success') {
            document.getElementById(price_id).innerHTML = getResult.price;
          }
        } catch (error) {
          console.log(error);
        }
      }

      async function updatePrices(){
        try {
          const getResult = await $.ajax({
            url: "get_price.php",
            type: "GET",
            dataType: "json",
          });
          if (getResult.status === 'success') {
            console.log('Retrieving prices...')
            document.getElementById("javaPrice").innerHTML = getResult.prices[0].price;
            document.getElementById("cafeSinglePrice").innerHTML = getResult.prices[1].price;
            document.getElementById("cafeDoublePrice").innerHTML = getResult.prices[2].price;
            document.getElementById("capSinglePrice").innerHTML = getResult.prices[3].price;
            document.getElementById("capDoublePrice").innerHTML = getResult.prices[4].price;
          }
        } catch (error) {
          console.log(error);
        }
      }
    </script>
  </body>
</html>
