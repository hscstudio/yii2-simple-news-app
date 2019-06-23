let items = document.querySelectorAll('link[rel=\"preload\"]')
for(let index=0; index<items.length; index++){
    let as = items[index].getAttribute('as')
    if(as=='style'){
        items[index].setAttribute('rel','stylesheet');
    }
}

if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
      navigator.serviceWorker.register('/sw.js')
          .then((reg) => {
              console.log('Service worker registered.', reg);
          },(err)=>{
              console.log('Service worker registration failed: ', err);
          });
    });
   }
   