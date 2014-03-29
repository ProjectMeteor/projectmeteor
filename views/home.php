<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Project Meteor - Campaigning for the 'Web Design App We Need'</title>

		<link href='http://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
		<link href="/assets/css/styles.css" rel="stylesheet" type="text/css"/>

		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="/apple_touch_icon.png" />

		<meta charset="UTF-8" />
		<meta name="description" content="Existing creative apps are not suited to today's web. We need something new..." />
		<meta name="keywords" content="project, meteor, adobe, fireworks, photoshop, pixelmator, acorn, web, design, app, application, mac, windows, osx, sketch, bohemian coding" />
		<meta name="author" content="See humans.txt!" />

		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<script src="/assets/js/modernizr.custom.28473.js"></script>

	</head>

	<body>

		<header id="header">

			<h1>Project Meteor</h1>
			<h2>
				<i>Campaigning for the</i><br />
				<b>Web Design</b><br />
				App We Need
			</h2>

		</header>

		<div id="wrap">
			<section id="intro">

				<div>
					<h2>Existing creative apps for designers are not suited to today's web.</h2>
					<p>We're forced to put up with dated tools and a disjointed workflow because there are no real alternatives. We need something new.</p>
				</div>
				
				<div>
					<p>Project Meteor is a campaign to demonstrate the demand for a modern web design app and give app developers direction as to what it should be.</p>
					<p>The apps we currently use are software dinosaurs, and it's about time we had an extinction event… it's time for someone to deliver the meteor that causes it.</p>
				</div>

			</section>

			<section id="yesplease" class="req">

				<h1 class="bang">Yes Please</h1>

				<ul>
					<li>Fluid / fixed page layout (page flow, grids, etc)</li>
					<li>Realistic rendering of text and styles (text wrapping, css font styles)</li>
					<li>Document-level type styles and integration with font services (e.g. Typekit)</li>
					<li>Objects that can be styled using rules that translate to CSS (e.g. gradients etc)</li>
					<li>Bitmap and Vector editing with non-destructive effects/filters</li>
					<li>Document and object states (e.g. 'on-hover' etc)</li>
				</ul>

			</section>

			<section id="nothanks" class="req">

				<h1 class="bang">No Thanks</h1>

				<ul>
					<li>HTML code output</li>
					<li>Measurement units which don't translate to CSS</li>
					<li>Non-native application UI / keyboard shortcuts</li>
					<li>Another rapid prototyping tool</li>
					<li>Monthly subscription</li>
					<li>Bloated and sluggish</li>
				</ul>

			</section>

			<section id="really">

				<h1 class="bang">Do we really need this?</h1>

				<p>
					<strong>Yes, we do!</strong> Designers have been writing about the need for a better web design app for some time.
				</p>

				<ul class="bones">
					<li><a href="http://www.zeldman.com/2010/07/05/an-indesign-for-html-and-css/">An InDesign for HTML and CSS?</a> <em>(Zeldman)</em></li>
					<li><a href="http://jasonsantamaria.com/articles/a-real-web-design-application/">A real web design application</a> <em>(Jason Santa Maria)</em></li>
					<li><a href="http://hicksdesign.co.uk/journal/a-big-assed-post-about-fireworks">A big-assed post about Fireworks</a> <em>(Jon Hicks)</em></li>
					<li><a href="http://nathanpitman.com/567/an-open-letter-to-software-developers-re-adobe-fireworks">An open letter to software developers RE Adobe Fireworks</a> <em>(Nathan Pitman)</em></li>
					<li><a href="http://elliotjaystocks.com/blog/web-fonts-in-desktop-applications/">Using web fonts in desktop design apps</a> <em>(Elliot Jay Stocks)</em></li>
					<li><a href="http://www.netmagazine.com/features/perfect-web-design-app-and-why-it-doesn-t-exist" rel="external">The perfect web design app… and why it doesn’t exist</a> <em>(.Net magazine)</em></li>
				</ul>

			</section>

			<section id="tools">

				<h1 class="bang">How Can I Help?</h1>
				<p>Spread the word. If you agree that current tools don't cut it, <a id="inlinetweeta" href="https://twitter.com/share?source=tweetbutton&amp;text=I%27m+campaigning+for+the+web+design+app+we+need&amp;url=http%3A%2F%2Fprojectmeteor.org%2F&amp;via=project_meteor">tweet this</a> to add your voice to the campaign.</p>
				
				<p>Are you a indie developer or a software house? We'd like to make Project Meteor a reality and are happy to consult with you to make that happen - <a href="mailto:team@projectmeteor.org">Contact us</a>.</p>

			</section>

			<section id="support">

				<div>
					<h1 class="bang">Support the campaign by sharing this on Twitter!</h1>
					<div id="maintweet">
						<a id="maintweeta" href="https://twitter.com/share?source=tweetbutton&amp;text=I%27m+campaigning+for+the+web+design+app+we+need&amp;url=http%3A%2F%2Fprojectmeteor.org%2F&amp;via=project_meteor">Tweet</a>

						<a href="http://twitter.com/share"
							class="twitter-share-button"
							data-url="http://projectmeteor.org"
							data-text="I'm campaigning for the web design app we need"
							data-count="horizontal"
							data-via="project_meteor">Tweet</a>
					</div>


					<div id="latest" class="tweets">

						<h2 class="bang">Latest Tweets</h2>

						<ul>
						<?php foreach($ourtweets as $tweet) :?>
							<li>
								<img src="/assets/images/tweet_meteor.png" alt="Small meteor" />
								<p class="when"><?php echo $tweet['created_at']?></p>
								<p><strong>Project Meteor</strong></p>
								<p><?php echo $tweet['text']?></p>
							</li>
						<?php endforeach;?>
						</ul>

					</div>

					<div id="quotes" class="quotes">

						<h2 class="bang">Quotes</h2>

						<ul>
						<?php foreach($quotes as $tweet) :?>
							<li>
								<img src="<?php echo $tweet['image']?>" alt="<?php echo $tweet['name']?> Twitter image" />
								<p><strong><?php echo $tweet['name']?></strong></p>
								<p><?php echo $tweet['text']?></p>
							</li>
						<?php endforeach;?>
						</ul>

					</div>


					<h2 class="bang" id="badges">Show your support</h1>

					<div id="badge">
						<h3>Badge</h3>

						<p>
							<img src="/assets/badges_wallpaper/pm-support-button-120-60.gif" alt="Project Meteor support badge" />
						</p>

						<p>
							<a href="/assets/badges_wallpaper/pm-support-button-120-60.png">Download PNG</a><br />
							<a href="/assets/badges_wallpaper/pm-support-button-120-60.gif">Download GIF</a><br />
						</p>
					</div>

					<div id="banner">
						<h3>Banner</h3>

						<p>
							<img src="/assets/badges_wallpaper/pm-support-banner-468-60.jpg" alt="Project Meteor support banner" />
						</p>

						<p>
							<a href="/assets/badges_wallpaper/pm-support-banner-468-60.png">Download PNG</a><br />
							<a href="/assets/badges_wallpaper/pm-support-banner-468-60.jpg">Download JPG</a><br />
						</p>

					</div>

					<div id="wallpaper">
						<h3>Wallpaper</h3>

						<p>
							<img src="/assets/images/wallpaper.jpg" alt="Project Meteor wallpaper" />
						</p>

						<p>
							<a href="/assets/badges_wallpaper/project-meteor-wallpaper-1920x1080.jpg">1920 x 1080</a><br />
							<a href="/assets/badges_wallpaper/project-meteor-wallpaper-1600x900.jpg">1600 x 900</a><br />
							<a href="/assets/badges_wallpaper/project-meteor-wallpaper-1280x720.jpg">1280 x 720</a><br />
						</p>

					</div>



				</div>

			</section>

			<section id="about">

				<h1 class="bang">Insurgents</h1>
				<ul>
					<?php foreach ($insurgents as $person): ?>
						<li>
							<a href="http://twitter.com/<?php echo $person['twitter'] ?>"><img src="/assets/images/team/<?php echo $person['pic'] ?>" alt="<?php echo $person['name'] ?>" /></a><?php echo $person['name'] ?><br /><a href="http://twitter.com/<?php echo $person['twitter'] ?>" class="twitter-anywhere-user">@<?php echo $person['twitter'] ?></a><br />
						</li>
					<?php endforeach ?>
					<li>
						<a href="http://twitter.com/craiggrannell"><img src="/assets/images/team/cg.jpg" alt="Craig Grannell" /></a>
						Craig Grannell<br /><a href="http://twitter.com/craiggrannell" class="twitter-anywhere-user">@craiggrannell</a><br />
					</li>
				</ul>

				<aside>
					<p><strong>We're a bunch of web designers and developers, we're fed up with 'making do'.</strong></p>
					<p>After a number of discussions at a <a href="http://creativeassembly.net" title="Creative Assembly">local meet-up</a>, we decided it was time we did something pro-active to encourage developers to sit up and take notice.</p>
				</aside>

			</section>

			<footer>
				<p>
					A <a href="http://creativeassembly.net" rel="external">Creative Assembly</a> Project - &copy; <?php echo date('Y'); ?> Creative Assembly.
				</p>
				<p id="tweet">
					<a href="http://twitter.com/project_meteor" title="Project Meteor on Twitter">@project_meteor</a>
				</p>
			</footer>

		</div>

		<div id="topbar">

			<p>
				<strong>Project Meteor</strong>
				<a href="http://twitter.com/project_meteor" id="follow-twitterapi" class="twitter-follow-link" title="Project Meteor on Twitter">Follow us on Twitter</a>
				<a href="http://twitter.com/share"
					class="twitter-share-button"
					data-url="http://projectmeteor.org"
					data-text="I'm campaigning for the web design app we need"
					data-via="project_meteor"
					data-count="horizontal">Tweet</a>
			</p>

			<nav>
				<!--<h1>Nav</h1>-->
				<ul>
					<li><a href="#header">^ Top</a></li>
					<li><a href="#intro">Features</a></li>
					<li><a href="#support">Support via Twitter</a></li>
					<li><a href="#badges">Support badges</a></li>
					<li><a href="#contact">Contact us</a></li>
				</ul>
			</nav>

		</div>

		

<script src="http://use.typekit.com/fxz8xgt.js"></script>
<script src="http://platform.twitter.com/widgets.js"></script>
<script src="http://platform.twitter.com/anywhere.js?id=XRv9cjldCGlyHlJXilERA&amp;v=1"></script>
<script>

	// fonts
	try{Typekit.load();}catch(e){}

	// twitter hovercards
	twttr.anywhere(function (T) {
		T.hovercards();
	});

	// tweet in new window
	function twoot(ev) {
		ev.preventDefault();
		w = window.open('https://twitter.com/share?source=tweetbutton&text=I%27m+campaigning+for+the+web+design+app+we+need&url=http%3A%2F%2Fprojectmeteor.org%2F&via=project_meteor', 'twindow', 'height=420,width=550');
		w.focus();
	}

	document.getElementById("maintweeta").onclick = function(ev) {
		twoot(ev);
	}
	document.getElementById("inlinetweeta").onclick = function(ev) {
		twoot(ev);
	}

	// analytics
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-24950204-1']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script');
		ga.type = 'text/javascript';
		ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(ga, s);
	})();
</script>

	</body>
</html>