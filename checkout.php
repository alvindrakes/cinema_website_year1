<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHECKOUT</title>
    <link href="plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="plugins/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css"/>
    <link href="plugins/bootstrap-select-1.12.2/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head>
<body onload="getInfo(1);getInfo(2);getPrices(3);subtotal(0);subtotal(1);">


<div class="content">
    <div class="checkout">
        <div class="container">
            <div class="main-title">CHECKOUT CART</div>
            <div class="checkout-summary">
                <div class="sub-title">1.SUMMARY</div>
                <div class="checkout-section-summary">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-summary">MOVIE TICKET</div>
                        </div>
                        <div class="col-md-6">
                            <div id="totaltickets" class="box-summary right">RM120.00</div>
                        </div>
                    </div>
                </div>
                <div class="checkout-section-summary movies-details">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <div class="box-summary"><?php
                            echo $_SESSION["movie_name"];
                            ?></div>
                        </div>
                        <div class="col-md-2">
                            <div class="box-center center">RM10.00</div>
                        </div>
                        <div class="col-md-2">
                            <div id="seatsNO" class="box-center center">6 SEATS</div>
                        </div>
                        <div class="col-md-4">
                            <div id="seats" class="box-summary right">A2 A3 A4 B2 B3 B4</div>
                        </div>
                    </div>
                </div>
                <div class="checkout-section-summary">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-summary">REFRESHMENTS</div>
                        </div>
                        <div class="col-md-6">
                            <div id="totalrefresh" class="box-summary right">RM35.00</div>
                        </div>
                    </div>
                </div>
                <div class="checkout-section-summary">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-summary">TOTAL AMOUNT</div>
                        </div>
                        <div class="col-md-6">
                            <div id="total" class="box-summary right">RM155.00</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkout-summary col-md-6 center-block no-float clearfix">
                <div class="sub-title">2.PAYMENTS DETAILS</div>
                <div class="checkout-section-payment">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="box-summary">CREDIT CARD</div>
                        </div>
                        <div class="col-md-2">
                            <img src="images/card1.png" class="img-responsive"/>
                        </div>
                        <div class="col-md-3">
                            <img src="images/card2.png" class="img-responsive"/>
                        </div>
                    </div>
                </div>
                <div class="checkout-section-payment">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-summary">CARD NUMBER</div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-summary right">1515615130219</div>
                        </div>
                    </div>
                </div>
                <div class="checkout-section-payment">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-summary">EMAIL</div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-summary right">abcd@gmail.com</div>
                        </div>
                    </div>
                </div>
                <div class="checkout-section-payment">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-summary">ORDER ID</div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-summary right"><?php
                            echo $_SESSION["customer_id"];
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkout-summary col-md-6 center-block no-float clearfix">
                <div class="sub-title">3.PLACE ORDER</div>
                <div class="checkout-section-order">
                    <div class="row">
                        <div class="col-md-6 center">
                            <form action="homepage.html">
                                <button class="checkout-btn" href="#popup1" onclick="complete();">CONFIRM</button>
                            </form>
                        </div>
                        <div class="col-md-6 center">
                            <form action="homepage.html">
                                <button class="checkout-btn" href="#popup2">CANCEL</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

        <div id="popup1" class="overlay">
            <div class="popup">
                <h2> BOOKING SUCCESSFUL</h2>
                <a class="close" href="#">&times;</a>
            </div>
        </div>



    
<script>
    var total=0;
    var ticketTotal=0;
    var refreshTotal=0;
    var num_seats=0;
    function getInfo(num){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				//alert(this.responseText);
                var details = JSON.parse(this.responseText);
                //alert(details);
                if (num==2){
                    var str="";
                    for (var i=0; i<details.length; i++){
                        str += details[i];
                        num_seats += 1;
                        str += ' ';
                        //alert(str);
                    }
                    document.getElementById("seats").innerHTML = str;
                    document.getElementById("seatsNO").innerHTML = num_seats + " SEATS";
                    //alert(str);
                }
			}
		};
		  xhttp.open("GET", "checkout1.php?q="+num, true);
		  xhttp.send();

	}
    
    function getPrices(num){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				//alert(this.responseText);
                var details = JSON.parse(this.responseText);
                //alert(details);

                for (var x=0; x<details.length; x++){
                    total += Number(details[x]);    
                }
                document.getElementById("total").innerHTML = "RM" + total.toFixed(2);
			}
		};
		  xhttp.open("GET", "checkout1.php?q="+num, true);
		  xhttp.send();

	}
    
        function subtotal(num){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				//alert(this.responseText);
                var details = JSON.parse(this.responseText);
                //alert(details);

                for (var x=0; x<details.length; x++){
                    if (num===0){
                        ticketTotal += Number(details[x]);
                    }
                    else {
                        refreshTotal += Number(details[x]);
                    }
                }
                if (num===0){
                        document.getElementById("totaltickets").innerHTML = "RM" + ticketTotal.toFixed(2);
                    }
                    else {
                        document.getElementById("totalrefresh").innerHTML = "RM" + refreshTotal.toFixed(2);
                    }
                
			}
		};
		  xhttp.open("GET", "subtotal.php?q="+num, true);
		  xhttp.send();
	}
    
    function complete(){
        var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
                
			}
		};
		  xhttp.open("GET", "paid.php?q="+total, true);
		  xhttp.send();
          alert("Booking Successful");
    }
</script>

<script src="js/jquery-3.2.0.min.js"></script>
<script src="plugins/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="plugins/magnific-popup/magnific-popup.min.js"></script>
<script src="plugins/bootstrap-select-1.12.2/dist/js/bootstrap-select.min.js"></script>
<script src="js/common.js"></script>
<script type="text/javascript" src="plugins/jQuery-Seat-Charts-master/jquery.seat-charts.min.js"></script>
</body>
</html>
