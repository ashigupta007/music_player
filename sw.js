
    self.addEventListener('activate', function(event) {
      event.waitUntil(self.clients.claim());
    });

    var cacheName = 'platicon';
    var filesToCache = [
                '/',  
                '/index.html',
                '/css/animate.css',
                '/css/style.css',
                '/images/pwa-192x192.png',
                '/images/pwa-512x512.png',
                '/pages/search_list.html',
                '/pages/examples/clm_emotiondetection.html',
                'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
                'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
                'https://use.fontawesome.com/releases/v5.7.0/css/all.css',
                // 'https://fonts.googleapis.com/css?family=Raleway',
                // 'https://fonts.googleapis.com/css?family=Dancing+Script:700',

    ];
    self.addEventListener('install', function(e) {
      console.log('[ServiceWorker] Install');
      e.waitUntil(
        caches.open(cacheName).then(function(cache) {
          console.log('[ServiceWorker] Caching app shell');
          return cache.addAll(filesToCache);
        })
      );
    });
    self.addEventListener('activate',  event => {
      event.waitUntil(self.clients.claim());
    });
    self.addEventListener('fetch', event => {
      event.respondWith(
        caches.match(event.request, {ignoreSearch:true}).then(response => {
          return response || fetch(event.request);
        })
      );
    });
    self.skipWaiting();