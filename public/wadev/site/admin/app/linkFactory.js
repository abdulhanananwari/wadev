app
	.factory('LinkFactory', function() {

		var env = window.location.hostname == '192.168.0.227' ? 'dev' : 'prod';

		var domains = {
			site: window.location.protocol + '//' + window.location.host + '/',
			account: 'https://accounts.xolura.com/',
		}

		var apps = {
			api: domains.site + 'api/',
			authentication: domains.account + 'views/user/',
		};


		return {

			authentication: {
				login: apps.authentication + 'authentication/login',
			},

			post: {
				base: apps.api + 'post/'
			},

			slide: {
				base: apps.api + 'slide/'
			},

			salesperson: {
				base: apps.api + 'salesperson/'
			},

		};


	});