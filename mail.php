<!DOCTYPE html>
<html>
<head>
<title>Grocery Store</title>
<body>
<?php
require 'dbcon.php';
require 'header.php';
?>
<?php
$msg = '';
if (isset($_POST['Name']) && isset($_POST['Mobile']) && isset($_POST['msg'])) {
    $n = $_POST['Name'];
    $m = $_POST['Mobile'];
    $p = $_POST['msg'];
    $sql = "INSERT INTO feedback (`name`, `mobile`, `msg`) VALUES ('$n', '$m' ,'$p')";

    if ($conn->query($sql)) {
        $msg = 'Feedback Saved';
    } else {
        $msg = 'Error: '.$conn->error;
    }
}
?>
		<div class="w3l_banner_nav_right">
		<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rate Our Grocery Store</title>
<style>
.container {
    text-align: center;
}

.rating {
    unicode-bidi: bidi-override;
    direction: rtl;
    text-align: center;
    font-size: 30px;
    margin-bottom: 20px;
}

.star {
    display: inline-block;
    padding: 5px;
    color: #aaa;
    cursor: pointer;
}

.star:hover,
input[type="radio"]:checked ~ .star {
    color: #f90;
}
</style>
</head>
<body>
<div class="container"><br>
    <h2>Rate Our Grocery Store</h2>
    <div class="rating" id="rating">
        <input type="radio" id="star5" name="rating" value="5">
        <label for="star5" class="star">☆</label>
        <input type="radio" id="star4" name="rating" value="4">
        <label for="star4" class="star">☆</label>
        <input type="radio" id="star3" name="rating" value="3">
        <label for="star3" class="star">☆</label>
        <input type="radio" id="star2" name="rating" value="2">
        <label for="star2" class="star">☆</label>
        <input type="radio" id="star1" name="rating" value="1">
        <label for="star1" class="star">☆</label>
    </div>
    <div id="message"></div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('.star').click(function() {
        var rating = $(this).prevAll('input[type="radio"]').val();
        $('#message').text('Thank you for rating: ' + rating);
        // Send the rating to the server via AJAX
        $.ajax({
            type: 'POST',
            url: 'save_rating.php', // Specify the URL to handle the AJAX request
            data: { rating: rating },
            success: function(response) {
                console.log('Rating saved:', response);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
</script>
<?php
// Handle the rating submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['rating'])) {
        $rating = $_POST['rating'];
        // Save the rating to the database or perform any other necessary action
        echo '<script>console.log("Rating saved successfully: ' . $rating . '");</script>';
    } else {
        http_response_code(400);
        echo '<script>console.error("Rating value is missing.");</script>';
    }
}
?>
</body>
</html>
<!-- mail -->
		<div class="mail">
			<h3>Mail Us</h3>
			<div class="agileinfo_mail_grids">
				<div class="col-md-4 agileinfo_mail_grid_left">
					<ul>
						<li><i class="fa fa-home" aria-hidden="true"></i></li>
						<li>address<span>Chennai</span></li>
					</ul>
					<ul>
						<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
						<li>email<span><a href="mailto:info@example.com">store@grocery.com</a></span></li>
					</ul>
					<ul>
						<li><i class="fa fa-phone" aria-hidden="true"></i></li>
						<li>call to us<span>(+91) 9900990099</span></li>
					</ul>
				</div>
				<div class="col-md-8 agileinfo_mail_grid_right">
					<form action="" method="post">
                        <div><?php echo $msg; ?></div>
                        
						<div class="col-md-6 wthree_contact_left_grid">
							<input type="text" name="Name" value="Name*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name*';}" required="">
							
						</div>
						<div class="col-md-6 wthree_contact_left_grid">
							<input type="text" name="Mobile" value="Mobile" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone*';}" required="">
                        </div>
						<div class="clearfix"> </div>
						<textarea  name="msg" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required>Message...</textarea>

                        <input type="submit"  name="submit" value="Submit">
						<input type="reset" value="Clear">
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //mail -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- map -->
	<div class="map">
		</div>
<!-- //map -->
<!-- newsletter -->
	<div class="newsletter">
		<div class="container">
			
			<div class="clearfix"> </div>
		</div>
	</div>
<?php include 'footer.php'?>
</body>
</html>