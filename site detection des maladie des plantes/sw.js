const staticCachName = 'cache_site_static_v1';
const dynamiccachname = 'cache_dynamic_v1';
//
const assest=[
  '/',
  'home.html',
  'css/bootstrap/css/bootstrap.css',
  'css/bootstrap/css/bootstrap.css.map',
  'css/bootstrap/css/bootstrap.min.css',
  'css/bootstrap/css/bootstrap.min.css.map',
  'css/bootstrap/css/bootstrap-grid.css',
  'css/bootstrap/css/bootstrap-grid.css.map',
  'css/bootstrap/css/bootstrap-grid.min.css',
  'css/bootstrap/css/bootstrap-grid.min.css.map',
  'css/bootstrap/css/bootstrap-reboot.css',
  'css/bootstrap/css/bootstrap-reboot.css.map',
  'css/bootstrap/css/bootstrap-reboot.min.css',
  'css/bootstrap/css/bootstrap-reboot.min.css.map',
  'css/font-awesome/css/font-awesome.css',
  'css/font-awesome/css/font-awesome.min.css',
  'css/font-awesome/fonts/FontAwesome.otf',
  'css/font-awesome/fonts/fontawesome-webfont.eot',
  'css/font-awesome/fonts/fontawesome-webfont.svg',
  'css/font-awesome/fonts/fontawesome-webfont.ttf',
  'css/font-awesome/fonts/fontawesome-webfont.woff',
  'css/font-awesome/fonts/fontawesome-webfont.woff2',
  'css/style/style.css',
  'css/style/style_login.css',
  'css/style/style_register.css',
  'css/style/style-green.css',
  'css/style/style-orange.css',
  'css/style/style-purple.css',
  'css/style/style-red.css',
  'css/style/style-sky-blue.css',
  'js/bootstrap/js/bootstrap.bundle.js',
  'js/bootstrap/js/bootstrap.bundle.js.map',
  'js/bootstrap/js/bootstrap.bundle.min.js',
  'js/bootstrap/js/bootstrap.bundle.min.js.map',
  'js/bootstrap/js/bootstrap.js',
  'js/bootstrap/js/bootstrap.min.js',
  'js/bootstrap/js/bootstrap.js.map',
  'js/bootstrap/js/bootstrap.min.js.map',
  'js/jquery/jquery.min.js',
  'js/jquery/jquery-migrate.min.js',
  'js/main_login.js',
  'js/main_register.js',
  'js/main.js',
  'img/Ag1.jpg',
  'img/avatar.svg',
  'img/bg.svg',
  'img/med.jpg',
  'img/ml.jpg',
  'img/overlay-bg.jpg',
  'img/ph.jpg',
  'img/ph1.jpg',
  'img/ph2.jpg',
  'img/ph3.png',
  'img/plt.JPG',
  'img/tra.jpg',
  'img/tra2.jpg',
  'img/user1.png',
  'img/user2.jpeg',
  'img/user3.png',
  'img/wave.png',
  'img/work-1.jpg',
  'lib/animate/animate.css',
  'lib/animate/animate.min.css',
  'lib/bootstrap/css/bootstrap.css',
  'lib/bootstrap/css/bootstrap.min.css',
  'lib/bootstrap/css/bootstrap.min.css.map',
  'lib/bootstrap/js/bootstrap.js',
  'lib/bootstrap/js/bootstrap.min.js',
  'lib/bootstrap/js/bootstrap.min.js.map',
  'lib/counterup/jquery.counterup.js',
  'lib/counterup/jquery.counterup.min.js',
  'lib/counterup/jquery.waypoints.min.js',
  'lib/easing/easing.js',
  'lib/easing/easing.min.js',
  'lib/font-awesome/css/font-awesome.css',
  'lib/font-awesome/css/font-awesome.min.css',
  'lib/font-awesome/fonts/FontAwesome.otf',
  'lib/font-awesome/fonts/fontawesome-webfont.eot',
  'lib/font-awesome/fonts/fontawesome-webfont.svg',
  'lib/font-awesome/fonts/fontawesome-webfont.ttf',
  'lib/font-awesome/fonts/fontawesome-webfont.woff',
  'lib/font-awesome/fonts/fontawesome-webfont.woff2',
  'lib/ionicons/css/ionicons.css',
  'lib/ionicons/css/ionicons.min.css',
  'lib/ionicons/fonts/ionicons.eot',
  'lib/ionicons/fonts/ionicons.svg',
  'lib/ionicons/fonts/ionicons.ttf',
  'lib/ionicons/fonts/ionicons.woff',
  'lib/jquery/jquery.min.js',
  'lib/jquery/jquery-migrate.min.js',
  'lib/lightbox/css/lightbox.css',
  'lib/lightbox/css/lightbox.min.css',
  'lib/lightbox/images/close.png',
  'lib/lightbox/images/loading.gif',
  'lib/lightbox/images/next.png',
  'lib/lightbox/images/prev.png',
  'lib/lightbox/js/lightbox.js',
  'lib/lightbox/js/lightbox.min.js',
  'lib/owlcarousel/assets/ajax-loader.gif',
  'lib/owlcarousel/assets/owl.carousel.css',
  'lib/owlcarousel/assets/owl.carousel.min.css',
  'lib/owlcarousel/assets/owl.theme.default.css',
  'lib/owlcarousel/assets/owl.theme.default.min.css',
  'lib/owlcarousel/assets/owl.theme.green.css',
  'lib/owlcarousel/assets/owl.theme.green.min.css',
  'lib/owlcarousel/assets/owl.video.play.png',
  'lib/owlcarousel/owl.carousel.js',
  'lib/owlcarousel/owl.carousel.min.js',
  'lib/popper/popper.min.js',
  'lib/popper/popper.min.js.map.json',
  'lib/typed/typed.js',
  'lib/typed/typed.min.js',
  'lib/typed/typed.min.js.map',
  'favicon.ico',
  'page_auther/img/med.jpg',
  'page_auther/img/overlay-bg.jpg',
  'page_auther/biblio_maladie/jquery-2.1.3.min.js',
  'page_auther/biblio_maladie/pagination.js',
  'page_auther/biblio_maladie/simple-bootstrap-paginator.js',
  'page_auther/biblio_maladie/style2.css',
  'page_auther/biblio_plante/jquery-2.1.3.min.js',
  'page_auther/biblio_plante/pagination.js',
  'page_auther/biblio_plante/simple-bootstrap-paginator.js',
  'page_auther/biblio_plante/style2.css',
  'page_auther/biblio_plante_medicine/jquery-2.1.3.min.js',
  'page_auther/biblio_plante_medicine/pagination.js',
  'page_auther/biblio_plante_medicine/simple-bootstrap-paginator.js',
  'page_auther/biblio_plante_medicine/style2.css',
  'page_auther/biblio_traitement/jquery-2.1.3.min.js',
  'page_auther/biblio_traitement/pagination.js',
  'page_auther/biblio_traitement/simple-bootstrap-paginator.js',
  'page_auther/biblio_traitement/style2.css',
  'page_auther/User/assets/img/logo2.png',
  'page_auther/User/assets/img/portfolio/at.png',
  'page_auther/User/assets/img/portfolio/med.jpg',
  'page_auther/User/assets/img/portfolio/medk.jpg',
  'page_auther/User/assets/img/portfolio/ml.jpg',
  'page_auther/User/assets/img/portfolio/ml.png',
  'page_auther/User/assets/img/portfolio/plt.JPG',
  'page_auther/User/assets/img/portfolio/plt2.jpg',
  'page_auther/User/assets/img/portfolio/rc1.png',
  'page_auther/User/assets/img/portfolio/rc2.jpg',
  'page_auther/User/assets/img/portfolio/tra.jpg',
  'page_auther/User/assets/img/portfolio/tra2.jpg',
  'page_auther/User/assets/img/portfolio/usmba.jpg',
  'page_auther/User/biblio_maladie/jquery-2.1.3.min.js',
  'page_auther/User/biblio_maladie/pagination.js',
  'page_auther/User/biblio_maladie/simple-bootstrap-paginator.js',
  'page_auther/User/biblio_maladie/style2.css',
  'page_auther/User/biblio_plante/jquery-2.1.3.min.js',
  'page_auther/User/biblio_plante/pagination.js',
  'page_auther/User/biblio_plante/simple-bootstrap-paginator.js',
  'page_auther/User/biblio_plante/style2.css',
  'page_auther/User/biblio_plante_medicine/jquery-2.1.3.min.js',
  'page_auther/User/biblio_plante_medicine/pagination.js',
  'page_auther/User/biblio_plante_medicine/simple-bootstrap-paginator.js',
  'page_auther/User/biblio_plante_medicine/style2.css',
  'page_auther/User/biblio_traitement/jquery-2.1.3.min.js',
  'page_auther/User/biblio_traitement/pagination.js',
  'page_auther/User/biblio_traitement/simple-bootstrap-paginator.js',
  'page_auther/User/biblio_traitement/style2.css',
  'page_auther/User/bootstrap/css/bootstrap.min.css',
  'page_auther/User/bootstrap/css/bootstrap.css',
  'page_auther/User/bootstrap/css/bootstrap.min.css.map',
  'page_auther/User/bootstrap/css/bootstrap.css.map',
  'page_auther/User/bootstrap/js/bootstrap.js',
  'page_auther/User/bootstrap/js/bootstrap.js.map',
  'page_auther/User/bootstrap/js/bootstrap.min.js',
  'page_auther/User/bootstrap/js/bootstrap.min.js.map',
  'page_auther/User/bootstrap/js/bootstrap.bundle.js',
  'page_auther/User/bootstrap/js/bootstrap.bundle.js.map',
  'page_auther/User/bootstrap/js/bootstrap.bundle.min.js',
  'page_auther/User/bootstrap/js/bootstrap.bundle.min.js.map',
  'page_auther/User/css/heading.css',
  'page_auther/User/css/style.css',
  'page_auther/User/css/body.css',
  'page_auther/User/font-awesome/css/font-awesome.css',
  'page_auther/User/font-awesome/css/font-awesome.min.css',
  'page_auther/User/font-awesome/fonts/FontAwesome.otf',
  'page_auther/User/font-awesome/fonts/fontawesome-webfont.eot',
  'page_auther/User/font-awesome/fonts/fontawesome-webfont.svg',
  'page_auther/User/font-awesome/fonts/fontawesome-webfont.ttf',
  'page_auther/User/font-awesome/fonts/fontawesome-webfont.woff',
  'page_auther/User/font-awesome/fonts/fontawesome-webfont.woff2',
  'page_auther/User/img/Ag1.jpg',
  'page_auther/User/img/avatar.svg',
  'page_auther/User/img/bg.svg',
  'page_auther/User/img/logo2.png',
  'page_auther/User/img/overlay-bg.jpg',
  'page_auther/User/img/ph2.jpg',
  'page_auther/User/img/up1.png',
  'page_auther/User/img/user1.png',
  'page_auther/User/img/user2.jpeg',
  'page_auther/User/img/user3.png',
  'page_auther/User/img/wave.png',
  'page_auther/User/img/work-1.jpg',
  'page_auther/User/jquery/jquery.min.js',
  'page_auther/User/jquery/jquery-migrate.min.js',
  'page_auther/User/js/scripts.js',
  'page_auther/User/js/main.js',
  'page_auther/User/bower_components/bootstrap/dist/css/bootstrap.min.css',
  'page_auther/User/bower_components/font-awesome/css/font-awesome.min.css',
  'page_auther/User/bower_components/select2/dist/css/select2.min.css',
  'page_auther/User/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
  'page_auther/User/dist/css/AdminLTE.min.css',
  'page_auther/User/dist/css/skins/_all-skins.min.css',
  'page_auther/User/bower_components/jquery/dist/jquery.min.js',
  'page_auther/User/bower_components/jquery-ui/jquery-ui.min.js',
  'page_auther/User/bower_components/bootstrap/dist/js/bootstrap.min.js',
  'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js',
  'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js',
  'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js',
  'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
  'page_auther/pagenotfound.html',
  ];

//install service worker
self.addEventListener('install',evt => {
 evt.waitUntil(
 caches.open(staticCachName).then(cache => {
   cache.addAll(assest);
 }))
})

//activate event
self.addEventListener('activate',evt => {
     evt.waitUntil(
      caches.keys().then(keys => {
        return Promise.all(keys.filter(key => key !== staticCachName && key !== dynamiccachname).map(key => caches.delete(key)))
      })
    );
  })


//fetch event
self.addEventListener('fetch',evt => {
    //console.log('fetch event ',evt);
     evt.respondWith(
      caches.match(evt.request).then(cacheRes => {
        return cacheRes || fetch(evt.request);
        //  || fetch(evt.request).then(fetchRes => {
        // 	return caches.open(dynamiccachname).then(cache => {
        // 		cache.put(evt.request.url, fetchRes.clone());
        // 		return fetchRes;
        // 	})
        // });
      }).catch(() => caches.match('page_auther/pagenotfound.html'))
    );
  })

