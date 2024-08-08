    

	<div class="footer">
		<div class="footer-container">
			<div class="footer-column">
				<h3>Get in touch</h3>
				<p class="fa fa-location"><i class="sr-only">location</i> Office No. G1, on the ground floor, building Prestige Plaza, Albela Signal, Garden West, near Karachi Haleem, Karachi., Karachi, Pakistan</p>
				<p class="fa fa-envelope"><i class="sr-only">Email</i></i> support@blackbeiger.com</p>
				<p class="fa fa-phone"><i class="sr-only">Phone</i></i> 0334-3466538</p>
				<div class="footer-icons">
					<p class="mb-0 d-flex">
						<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
						<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
						<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
						<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-youtube"><i class="sr-only">Youtube</i></span></a>
					</p>
				</div>
			</div>
			<div class="footer-column">
				<h3>Services</h3>
				<a href="#">Return & Exchange Policy</a>
				<a href="#">FAQs</a>
				<a href="#">Privacy Policy</a>
				<a href="#">Terms & Condition</a>
				<a href="#">Payment Options</a>
			</div>
			<div class="footer-column">
				<h3>Our Company</h3>
				<a href="#">Our Management</a>
				<a href="#">About Us</a>
			</div>
			<div class="footer-column newsletter">
				<h3>Newsletter Signup</h3>
				<p>Subscribe to our newsletter and get 10% off your first purchase</p>
				<form action="#">
					<input type="email" placeholder="Your email address">
					<input type="submit" value="Subscribe">
				</form>
			</div>
		</div>
	</div>
	<!-- Back to Top Button -->
<button onclick="topFunction()" id="backToTopBtn" title="Go to top">&#8679;</button>

<style>
  #backToTopBtn {
    display: none; /* Hidden by default */
    position: fixed; /* Fixed/sticky position */
    bottom: 20px; /* Place the button at the bottom of the page */
    right: 30px; /* Place the button 30px from the right */
    z-index: 99; /* Make sure it does not overlap */
    border: none; /* Remove borders */
    outline: none; /* Remove outline */
    background-color: #100f0f; /* Set a background color */
    color: white; /* Text color */
    cursor: pointer; /* Add a mouse pointer on hover */
    padding: 15px; /* Some padding */
    border-radius: 10px; /* Rounded corners */
  }

  #backToTopBtn:hover {
    background-color: #555; /* Add a dark-grey background on hover */
  }
</style>

<script>
  //Get the button
  var mybutton = document.getElementById("backToTopBtn");

  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
	}
</script>
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/popper.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>

  </body>
</hmtl>