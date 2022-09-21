<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    </script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>



</head>

<body>
<form name="ajaxform" id="ajaxform" method="POST" class="form-group">
  First Name: <input type="text" name="fname" value="" class="form-control"/> <br/> Last Name: <input type="text" name="lname" value="" class="form-control"/> <br/> Email : <input type="text" name="email" value="" class="form-control"/> <br/>
  <button type="submit" class="btn btn-default">submit</button>
</form>

<div class="modal fade" id="registration" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h3 class="modal-title">Merci !</h3>
      </div>
    </div>
  </div>
</div>


<script>
    $("#ajaxform").submit(function(e) {

var url = "test.php"; // the script where you handle the form input.

$.ajax({
  type: "POST",
  url: url,
  data: $("#ajaxform").serialize(), // serializes the form's elements.
  success: function(data) 
  {
   //if request successful
   $(".modal-title").text('Request successful');
   $('#registration').modal('show');
  },
  error: function(data) 
  {
    //if request unsuccessful
    $(".modal-title").text('Request failed');
    $('#registration').modal('show');
  }
}).done(function() {
  //finally, reinitialise modal text back to default 'merci'
  $(".modal-title").text('merci');
});

e.preventDefault(); // avoid to execute the actual submit of the form.
});
</script>
</body>

</html>