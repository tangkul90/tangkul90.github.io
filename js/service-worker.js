(function() {
  'use strict';

  // TODO 2.1 - Cache static assets on install
	var	CACHE_NAME	=	'tenuncache';
		var	urlsToCache	=	[
		'.',
		'index.php','animate.min.css','bootstrap.css','flexslider.css','font-awesome.css','ken-burns.css',
		'cara_pembayaran.php','menu.css','owl.carousel.css','bootstrap.js','custom.js',
		'footer.php','easing.js','imagezoom.js','jquery.classycountdown.js','jquery.flexslider.js','jquery.jscrollpane.min.js','jquery.knob.js','jquery.marquee.min.js',
		'header.php','jquery.menu-aim.js','jquery.mousewheel.js','jquery.throttle.js','jquery-2.2.3.min.js','jquery-scrolltofixed-min.js','main.js',
		'home.php','minicart.js','move-top.js','owl.carousel.js',                                                                                                                                                        
		'kontak.php',
		'sim_kom.php,
		'styles.css'
	];
	self.addEventListener('install',	function(event)	{
		event.waitUntil(
				caches.open(CACHE_NAME)
				.then(function(cache)	{
						return	cache.addAll(urlsToCache);
				})
		);
});

  // TODO 2.2 - Fetch from the cache
  
	self.addEventListener('fetch',	function(event)	{
		event.respondWith(
				caches.match(event.request)
				.then(function(response)	{
						return	response	||	fetchAndCache(event.request);
				})
		);
});

	function	fetchAndCache(url)	{
		return	fetch(url)
		.then(function(response)	{
				//	Check	if	we	received	a	valid	response
				if	(!response.ok)	{
						throw	Error(response.statusText);
				}
				return	caches.open(CACHE_NAME)
				.then(function(cache)	{
						cache.put(url,	response.clone());
						return	response;
				});
		})
		.catch(function(error)	{
				console.log('Request	failed:',	error);
				//	You	could	return	a	custom	offline	404	page	here
		});
}

})();
