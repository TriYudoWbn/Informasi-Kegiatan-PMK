var CACHE_NAME = 'Exodus-Cache';
var urlsToCache = [
     '.',
     'index.php',
     '404.php',
     'send_message.php',
     'config/koneksi.php',
     'css/style.css',
     'img/icon.png',
     'img/logo.jpg',
     'user/artikel/info_artikel.php',
     'user/kegiatan/info_kegiatan.php',
     'user/layout/footer.php',
     'user/layout/header.php',
     'user/layout/library.php'
];

self.addEventListener('install', e => {
  // Perform install steps
  e.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(urlsToCache).then(() => self.skipWaiting());
    })
  )
});


self.addEventListener('activate', (event) => {
  event.waitUntil(async function(){
    const cacheNames = await caches.keys();
      await Promise.all(
        cacheNames.filter((cacheName) => {
        }).map(cacheName => caches.delete(cacheName))
      );
  }());
});


self.addEventListener('fetch', function(event) {
  console.log('fetching url :'+event.request.url);
  event.respondWith(async function(){
  try{
    var fetchRequest = event.request.clone();
    return await fetch(fetchRequest).then(
      function(response){
        if(!response || response.status !== 200 || response.type !== 'basic'){
          return response;
        }
        var responseToCache = response.clone();

        caches.open(CACHE_NAME)
          .then(function(cache){
            cache.put(event.request, responseToCache);
          })
          return response;
      }
  )
}catch(err){
  return caches.match(event.request)
    .then(function(response) {
      console.log('cache match, return cache');
      if(response){
        return response;
      }else{
        return caches.match('404.php')
      }
    })
}
}());
});