<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?>
		</section><!-- #main -->
		<div id="footer-wrapper"></div>

		<footer role="contentinfo">
				<?php get_sidebar( 'footer' ); ?>
				<div id="twitterBar">
					<ul class="twitterFeed"></ul>
					<h4 class="twittAddress"><? $options = get_option('plugin_options'); echo $options['twitter']; ?></h4>
				</div>
				<div id="siteMap">
					<ul class="siteMapList">
						<li><a class="listHead" href="practice">Our Practice</a></li>
						<li><a class="smLink" href="practice#AboutUs_1">About Us</a></li>
						<li><a  class="smLink"href="practice#Locations_2">Locations</a></li>
						<li><a class="smLink" href="practice#Testimonials_3" class="vid">Ratings & Reviews</a></li>
						<li><a class="smLink" href="practice#Careers_4">Careers</a></li>
					</ul>
					<ul class="siteMapList">
						<li><a class="listHead" href="our-team#Overview_1">Our Team</a></li>
						<li><a class="smLink" href="our-team#Physicians_2">Physicians</a></li>
						<li><a class="smLink" href="our-team#Audiologists_3">Audiologists</a></li>
					</ul>
					<ul class="siteMapList">
						<li><a class="listHead" href="javascript:void();">Symptoms & Solutions</a></li>
						<li><a class="smLink" href="ears#Overview_1">Ears</a></li>
						<li><a class="smLink" href="nose-mouth#Overview_1">Nose</a></li>
						<li><a class="smLink" href="throat#Overview_1">Throat</a></li>
						<li><a class="smLink" href="head-neck#Overview_1">Head & Neck</a></li>
						<li><a class="smLink" href="pediatric#Overview_1">Pediatric</a></li>
						<li><a class="smLink" href="allergy#Overview_1">Allergy</a></li>
					</ul>
					<ul class="siteMapList">
						<li><a class="listHead" href="javascript:void();">Community</a></li>
						<li><a class="smLink" href="social-hub#Overview_1">socialHUB</a></li>
						<li><a class="smLink" href="ipure-patient#Overview_1">ipurePATIENT</a></li>
						<li><a class="smLink" href="health-records#Overview_1">Health Records</a></li>
						<li><a class="smLink" href="apps-tools#Overview_1">Apps & Tools</a></li>
						<li><a class="smLink" href="reviews#Overview_1">Reviews</a></li>
						<li><a class="smLink" href="philanthropy#Overview_1">Philanthropy</a></li>
					</ul>

 					<div id="socialLaunch" class="twittHead"> 
						<h4 class="twittHead">Social Media</h4>
						<a  a target="_blank" href="http://twitter.com/<?= str_replace('@', '', $options['twitter']) ?>" id="twitterBtn">Twitter</a>
						<a  a target="_blank" href="http://www.facebook.com/pages/<?= $options['facebook_name'] ?>/<?= $options['facebook_id'] ?>" id="faceBookBtn">Facebook</a>
						<a href="https://plus.google.com/u/0/b/<?= $options['googleplus'] ?>/<?= $options['googleplus'] ?>/" id="googleBtn">Google +</a>
					</div>
				</div>
				<div id="copyright">Copyright &copy; 2012, Fuel Medical Group. All rights reserved.</div>
		</footer><!-- footer -->
		<?php wp_footer(); ?>
		<div id="scheduleVisit" class="modal">
			<form id="scheduleVisitForm" method="post" action="">
				<input type="hidden" name="scheduleVisit" value="1"/>
				<div class="formItem"><label>Name:</label><input type="text" name="Name" class="required" /></div>
				<div class="formItem"><label>Email:</label><input type="text" name="Email" class="required email" /></div>
				<div class="formItem"><label>Phone:</label><input type="text" name="Phone" class="required phoneUS" /></div>
				<div class="formItem">
					<label>Preferred Time of Day:</label>
					<select name="Time">
						<option>Morning</option>
						<option>Afternoon</option>
					</select>
				</div>
				<div class="formItem">
					<label>Preferred Day of Week:</label>
					<select name="Day">
						<option>Monday</option>
						<option>Tuesday</option>
						<option>Wednesday</option>
						<option>Thursday</option>
						<option>Friday</option>
					</select>
				</div>
				<div class="formItem">
				    <label>Preferred Callback Time:</label>
				    <select name="callbackTime">
				        <option>Morning</option>
				        <option>Afternoon</option>
				    </select>
				</div>
				<div class="formItem submit"><input type="submit" name="submit" value="Schedule Visit" /></div>
			</form>
		</div>
		<div id="emailSuccess" class="modal">
  			<img alt="<?php bloginfo('name'); ?> Logo" src="<?php bloginfo('stylesheet_directory'); ?>/<?= $options['emailSuccessImage']; ?>" /><br />
  			<p>Your inquiry has been sent. Please expect to hear from our office within two business days.</p>
		</div>
		<div id="youTube" class="modal">
			<iframe id="ytFrame" width="458" height="255" src="http://www.youtube.com/embed/videoseries?list=PLEF1CA89616F11482&hl=en_US&rel=0" frameborder="0" allowfullscreen></iframe>	
		</div>
		<div id="locations" class="modal">
			<div class="location">
				<h4>Glendale</h4>
				<p>
				Physician's Medical Terrace<br />
				1505 Wilson Terrace # 270<br />
				Glendale, Ca 91206<br />
				Main: 818.241.2101<br />
				Fax: 818.241.2166
				</p>
			</div>

			<div class="location">
				<h4>Pasadena</h4>
				<p>
				Cotton South Building<br />
				50 Alessandro Place #230<br />
				Pasadena, Ca 91105<br />
				Main: 626.577.5550<br />
				Fax: 626.577.5544
				</p>
			</div>		
		</div>
		<script type="text/javascript">
		jQuery(function() {
			jQuery.getJSON('https://api.twitter.com/1/statuses/user_timeline.json?screen_name=<?php echo str_replace('@', '', $options['twitter']); ?>&exclude_replies=true&count=3&callback=?',
				function(data){
					jQuery.each(data, function (i, item) {
						var tweetText = item.text;
						tweetText = tweetText.replace(/http:\/\/\S+/g, '<a href="$&" target="_blank">$&</a>');
						tweetText = tweetText.replace(/(@)(\w+)/g, ' $1<a href="http://twitter.com/$2" target="_blank">$2</a>');
						tweetText = tweetText.replace(/(#)(\w+)/g, ' $1<a href="http://search.twitter.com/search?q=%23$2" target="_blank">$2</a>');
						jQuery('.twitterFeed').append('<li class="tweet"><div class="tweetBody">'+tweetText+'</div></li>');
					});
					setInterval(function() {
						jQuery('.twitterFeed li').filter(':last').hide().remove().prependTo(jQuery('.twitterFeed'));
						jQuery('.twitterFeed li:eq(0)').slideDown();									
					}, 5000);
			    }
			);
		})
		</script>
	</body>
</html>