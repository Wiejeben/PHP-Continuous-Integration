node {
	stage('Checkout') {
		git([url: 'https://github.com/Wiejeben/PHP-Continuous-Integration/', branch: 'master'])
	}

	stage('Composer') {
		sh 'composer install'
	}

	stage('Test') {
		try {
			sh 'phpunit --log-junit reports/phpunit/results.xml'
		} finally {
			junit 'reports/**/*.xml'
		}
	}
}