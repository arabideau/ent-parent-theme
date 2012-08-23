/*
	Any site-specific scripts you might have.
	Note that <html> innately gets a class of "no-js".
	This is to allow you to react to non-JS users.
	Recommend removing that and adding "js" as one of the first things your script does.
	Note that if you are using Modernizr, it already does this for you. :-)
*/

jQuery(function() {
    jQuery('.slideshow').slideshow();
	jQuery('ul.smallSlide').slideshow();

	jQuery('#schedule').click(function(e) {
		e.preventDefault();
		jQuery('#scheduleVisit').modal();
	});

  jQuery('#watch').click(function(e) {
    e.preventDefault();
    jQuery('#youTube').modal({ dataCss: { width:'474px', height:'272px' }, containerCss: { width:'474px', height:'272px' } });
  });

  jQuery('#contact').click(function(e) {
    e.preventDefault();
    jQuery('#locations').modal({ dataCss: { width:'550px', height:'225px' }, containerCss: { width:'550px', height:'225px' } });
  });


	jQuery('ul.sub-nav li a').hover(function() {
		jQuery(this).animate({ top : "-=15px", opacity: .85 }, 150); 
      }, function() {
		jQuery(this).animate({ top : "0", opacity: .7 }, 1200);  
     });

	jQuery('.location a.moreLink').click(function(e) {
		e.preventDefault();
		console.log(jQuery(this));
		if(jQuery(this).text() == 'View Map')
		jQuery(this).text('Hide Map').toggleClass('open').parent().siblings('.map').slideDown();
		else
		jQuery(this).text('View Map').toggleClass('open').parent().siblings('.map').slideUp();
	});

  jQuery('.tools').click(function() {
      jQuery('#dropDown').css('display', 'inline');
      jQuery('#dropDown').animate({ height: 'auto'}, 500);
  });

  jQuery('.call').click(function() {
      jQuery('#dropDownPhone').css('display', 'inline');
      jQuery('#dropDownPhone').animate({ height: 'auto'}, 500);
  });

  jQuery('a.close-tooltip').click(function() { 
    jQuery(this).parent().hide();
  });

})

function twitterCallback2(twitters) {
  var statusHTML = [];
  for (var i=0; i<twitters.length; i++){
    var username = twitters[i].user.screen_name;
    var status = twitters[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
      return '<a href="'+url+'">'+url+'</a>';
    }).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
      return  reply.charAt(0)+'<a href="http://twitter.com/'+reply.substring(1)+'">'+reply.substring(1)+'</a>';
    });
    statusHTML.push('<li><span>'+status+'</span> <br /> <a style="font-size:85%" href="http://twitter.com/'+username+'/statuses/'+twitters[i].id_str+'">'+relative_time(twitters[i].created_at)+'</a></li>');
  }
  document.getElementById('twitter_update_list').innerHTML = statusHTML.join('');
}

function relative_time(time_value) {
  var values = time_value.split(" ");
  time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
  var parsed_date = Date.parse(time_value);
  var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
  var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
  delta = delta + (relative_to.getTimezoneOffset() * 60);

  if (delta < 60) {
    return 'less than a minute ago';
  } else if(delta < 120) {
    return 'about a minute ago';
  } else if(delta < (60*60)) {
    return (parseInt(delta / 60)).toString() + ' minutes ago';
  } else if(delta < (120*60)) {
    return 'about an hour ago';
  } else if(delta < (24*60*60)) {
    return 'about ' + (parseInt(delta / 3600)).toString() + ' hours ago';
  } else if(delta < (48*60*60)) {
    return '1 day ago';
  } else {
    return (parseInt(delta / 86400)).toString() + ' days ago';
  }
}

function playVideo(sourceId, targetId) {
   if (typeof(sourceId)=='string') {sourceId=document.getElementById(sourceId);}
   if (typeof(targetId)=='string') {targetId=document.getElementById(targetId);}
   targetId.innerHTML=sourceId.innerHTML;
   return false;
}

(function($) {
	$.fn.slideshow = function(options) {
		options = $.extend({ 'timeout': 4000, 'speed': 300 }, options);
		return this.each(function() {
			var $elem = $(this);
			$elem.children().hide();
			$elem.children().eq(0).show();
			setInterval(function() {
				$elem.children().eq(0).fadeOut().appendTo($elem);
				$elem.children().eq(0).fadeIn(options.speed);
			}, options.timeout);
		});
	};
}(jQuery));