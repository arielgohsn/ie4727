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
                        echo json_encode(['status' => 'success', 'bestseller' => $bestseller, 'popular' => $popular]);
                    } else {
                        $popular = "Double";
                        echo json_encode(['status' => 'success', 'bestseller' => $bestseller, 'popular' => $popular]);
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
                        echo json_encode(['status' => 'success', 'bestseller' => $bestseller, 'popular' => $popular]);
                    } else {
                        $popular = "Double";
                        echo json_encode(['status' => 'success', 'bestseller' => $bestseller, 'popular' => $popular]);
                    }
                } else {
                    $bestseller = "Just Java";
                    $popular = "NULL";
                    echo json_encode(['status' => 'success', 'bestseller' => $bestseller, 'popular' => $popular]);
                }
                $db->close();
                ?>