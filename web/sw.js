let cacheName = 'simple-news-app-v1';
let filesToCache = [
    '/',
    '/assets/cdf882fd/css/bootstrap.min.css',
    //'/favicon.ico',
    '/css/site.css',
    //'/js/lazysizes.min.js',
    '/js/main.js'
];

self.addEventListener('install', function(e) {
 e.waitUntil(
   caches.open(cacheName).then(function(cache) {
     return cache.addAll(filesToCache)
   })
 )
})

self.addEventListener('activate',  event => {
    event.waitUntil(self.clients.claim());
});
   
self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request).then(response => {
            return response || fetch(event.request);
        })
    )
}) 