<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>

    <title> Checker K3 </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/uikit.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.js"></script>
	
</head>
<body>
<div class="bg">
<div class="uk-section">
<div class="uk-container">
<div class="uk-flex uk-flex-center">


<form method="post" action="">
  <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">

    <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: credit-card"></span>
<input class="uk-input" type='text' maxlength="16" name="card" onkeypress='validate(event)' placeholder="Enter Card" required />

        </div>
    </div>
	
	<div class="uk-flex uk-flex-center">
    <span class="uk-button-text"><input type="submit" class="uk-button uk-button-default" name="submit" value="Check"></span>
    </div>

	
	
	
	
	
	
	
	
     </div>
	 <div class="uk-flex uk-flex-center@m uk-flex-right@l">
    <div>
      <span class="uk-text-bottom">By &hearts;<a href="https://facebook.com/king3bady" target="_blank"> K3 </a></span> 
	  </div>
</div>
    </div>



<script>
function validate(evt) {
  var theEvent = evt || window.event;

  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
	  
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>
</form>
<?php
if (isset($_POST['submit'])) {
$card = $_POST['card'];
$json = file_get_contents('https://lookup.binlist.net/'.$card.'');
$data = json_decode($json, true);
$scheme = $data['scheme'];
$type = $data['type'];
$bank = ($data['bank']['name']);
$url = ($data['bank']['url']);
$city = ($data['country']['name']);
$currency = ($data['country']['currency']);
}
?>
</div>

<?php
if (isset($scheme)) {
echo '<br/>'; 
echo '<br/>'; 
echo '
<div class="uk-flex uk-flex-center uk-text-center">
  <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
'; 
echo $scheme; 
}
if (isset($type)) {
echo '<br/>'; 
echo '<br/>'; 
echo $type; 
}
if (isset($bank)) {
echo '<br/>'; 
echo '<br/>'; 
echo $bank; 
}
if (isset($url)) { 
echo '<br/>'; 
echo '<br/>';
echo $url; 
}
if (isset($city)) {
echo '<br/>'; 
echo '<br/>'; 
echo $city; 
}
if (isset($currency)) {
echo '<br/>'; 
echo '<br/>'; 
echo $currency; 
}

echo '
</div>
</div>'; 
?>

</div>
</div>
</div>

</body>
</html>