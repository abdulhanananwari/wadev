app
	.config(function($stateProvider, $urlRouterProvider) {

		$urlRouterProvider.otherwise('/index');

		$stateProvider

		.state('index', {
			url: '/index',
			templateUrl: 'app/index/index.html',
			controller: 'IndexController as ctrl',
			requireLogin: false,
  			pageTitle: 'Index'
		})
		
		.state('postIndex', {
			url: '/post/index',
			templateUrl: 'app/post/index/postIndex.html',
			controller: 'PostIndexController as ctrl',
  			pageTitle: 'Daftar Post'
		})
		.state('postShow', {
			url: '/post/show/:id',
			templateUrl: 'app/post/show/postShow.html',
			controller: 'PostShowController as ctrl',
  			pageTitle: 'Post'
		})

		.state('slideIndex', {
			url: '/slide/index',
			templateUrl: 'app/slide/index/slideIndex.html',
			controller: 'SlideIndexController as ctrl',
  			pageTitle: 'Daftar Slide'
		})
		.state('slideShow', {
			url: '/slide/show/:id',
			templateUrl: 'app/slide/show/slideShow.html',
			controller: 'SlideShowController as ctrl',
  			pageTitle: 'Slide'
		})
		
		.state('salespersonIndex', {
			url: '/salesperson/index',
			templateUrl: 'app/salesperson/index/salespersonIndex.html',
			controller: 'SalespersonIndexController as ctrl',
  			pageTitle: 'Daftar Salesperson'
		})
		.state('salespersonShow', {
			url: '/salesperson/show/:id',
			templateUrl: 'app/salesperson/show/salespersonShow.html',
			controller: 'SalespersonShowController as ctrl',
  			pageTitle: 'Salesperson'
		})

		.state('fileIndex', {
			url: '/file/index',
			templateUrl: 'app/file/index/fileIndex.html',
			controller: 'FileIndexController as ctrl',
  			pageTitle: 'Daftar File'
		})
		.state('logWhatsapp', {
			url: '/log/whatsapp',
			templateUrl: 'app/log/whatsapp/logWhatsapp.html',
			controller: 'LogWhatsappController as ctrl',
  			pageTitle: 'Daftar File'
		})
	});