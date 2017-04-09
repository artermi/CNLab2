<!-- Display the countdown timer in an element -->
<head>
<title>Wifi Usage</title>
</head>

<body>

<h1>Statistic:</h1>
</body>

<p id="demo"></p>
<script>
// Set the date we're counting down to
var countDownDate = new Date().getTime() + 1000 * 10;
// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = "Time Remain:" + days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>



<p id="demo2"></p>

<script>

var xmlhttp = new XMLHttpRequest();
var rx0 = 0;
var tx0 = 0

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        rx0 = myObj.rx ;
	tx0 = myObj.tx ;
    }
};
xmlhttp.open("GET", "data.php", true);
xmlhttp.send();

var y = setInterval(function() {
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          myObj = JSON.parse(this.responseText);
          var rx = Math.floor((myObj.rx - rx0)/1024);
  	  var tx = Math.floor((myObj.tx - tx0)/1024);
          document.getElementById("demo2").innerHTML = "traffic(recv/send):" + rx + '/' + tx + "KB";
      }
  };
  xmlhttp2.open("GET", "data.php", true);
  xmlhttp2.send();
}, 1000);

</script>