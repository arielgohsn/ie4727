document.addEventListener('DOMContentLoaded', function() {
    var java_qty = document.getElementById('java_qty');
    var cafeAuLait_single = document.getElementById('cafe_single');
    var cafeAuLait_double = document.getElementById('cafe_double');
    var cafeAuLait_qty = document.getElementById('cafe_qty');
    var cappuccino_single = document.getElementById('cappuccino_single');
    var cappuccino_double = document.getElementById('cappuccino_double');
    var cappuccino_qty = document.getElementById('cappu_qty');
    var total = document.getElementById('total_price');

    java_qty.addEventListener('change', cal_java, false);
    cafeAuLait_single.addEventListener('change', cal_cafe, false);
    cafeAuLait_double.addEventListener('change', cal_cafe, false);
    cafeAuLait_qty.addEventListener('change', cal_cafe, false);
    cappuccino_single.addEventListener('change', cal_cappu, false);
    cappuccino_double.addEventListener('change', cal_cappu, false);
    cappuccino_qty.addEventListener('change', cal_cappu, false);
    total.addEventListener('change', cal_total, false);
});


function cal_java(event){
    var qtyjavacheck = event.currentTarget;
    var pos = qtyjavacheck.value.search(/^\d*$/);

    if (pos!= 0){
        alert("You entered " + qtyjavacheck.value + " which is incorrect.\n" + "Only numbers are allowed");
        qtyjavacheck.value="";
        document.getElementById("java_subtotal").value = "";
        qtyjavacheck.focus();
        return false;
    }
    priceTag = document.getElementById('javaPrice').innerText;
    price = parseFloat(priceTag);
    subtotal = parseFloat(java_qty.value) * price;
    document.getElementById("java_subtotal").value = parseFloat(subtotal).toFixed(2);
    console.log(priceTag + price + subtotal);

    cal_total();
    //console.log(subtotal + java_qty);
}

function cal_cafe(event){
    // var cafeAuLait_single = document.getElementById('cafe_single');
    // var cafeAuLait_double = document.getElementById('cafe_double');
    var cafeAuLait_qty = document.getElementById('cafe_qty');
    var qtycafecheck = event.currentTarget;
    if (qtycafecheck == cafeAuLait_qty){
        var pos = qtycafecheck.value.search(/^\d*$/);
        if (pos != 0){
            alert("You entered " + qtycafecheck.value + " which is incorrect.\n" + "Only numbers are allowed");
            qtycafecheck.value="";
            document.getElementById("cafe_subtotal").value = "";
            qtycafecheck.focus();
            return false;
        }
    }
    var cafe_id = document.querySelector('input[name="cafeaulait"]:checked').id;
    cafe_id == "cafe_single" ? priceTag = document.getElementById('cafeSinglePrice').innerText : priceTag = document.getElementById('cafeDoublePrice').innerText;
    price = parseFloat(priceTag);
    subtotal = price * cafeAuLait_qty.value;
    document.getElementById('cafe_subtotal').value = parseFloat(subtotal).toFixed(2);
    console.log(priceTag + price + subtotal);
    cal_total();
    //console.log(subtotal + cafeAuLait_qty + price);
}

function cal_cappu(event){
    // var cappuccino_single = document.getElementById('cappuccino_single');
    // var cappuccino_double = document.getElementById('cappuccino_double');
    var cappuccino_qty = document.getElementById('cappu_qty');
    var qtycafecheck = event.currentTarget;
    if (qtycafecheck == cappuccino_qty){
        var pos = qtycafecheck.value.search(/^\d*$/);
        if (pos != 0){
            alert("You entered " + qtycafecheck.value + " which is incorrect.\n" + "Only numbers are allowed");
            qtycafecheck.value="";
            document.getElementById("cappu_subtotal").value = "";
            qtycafecheck.focus();
            return false;
        }
    }
    cappu_id = document.querySelector('input[name="cappuccino"]:checked').id;
    cappu_id == "cappuccino_single" ? priceTag = document.getElementById('capSinglePrice').textContent : priceTag = document.getElementById('capDoublePrice').textContent;
    price = parseFloat(priceTag);
    subtotal = price * cappuccino_qty.value;
    document.getElementById('cappu_subtotal').value = parseFloat(subtotal).toFixed(2);
    console.log(priceTag + price + subtotal);

    cal_total();
    //console.log(subtotal + cappuccino_qty + price);
}

function cal_total(){
    javaSub = parseFloat(document.getElementById('java_subtotal').value);
    aulaitSub = parseFloat(document.getElementById('cafe_subtotal').value);
    cappuSub = parseFloat(document.getElementById('cappu_subtotal').value);
    total_Price = javaSub + aulaitSub + cappuSub;
    document.getElementById("total_price").value = total_Price.toFixed(2);
    //console.log(javaSub + aulaitSub + cappuSub + "total price is" + total_Price);
}