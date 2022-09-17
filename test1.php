<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>

<div class="container">
  <h3>Tooltip Options</h3>
  <p>The <strong>trigger</strong> option specifies how the tooltip is triggered.</p>
  <div>
  <span onclick="copyURL()" style="cursor:pointer" class="input-group-text" id="copy-URL" >
                        <i class="fa-regular fa-copy"></i>share
                    </span>
  </div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    function copyURL() {
    // Get the text field
    var copyText = document.getElementById("inputURL");

    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);
}
$(document).ready(function(){
  $('#copy-URL').tooltip({title: "Hooray!", trigger: "click"});
});
</script>

</body>
</html>