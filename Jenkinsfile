node {
	stage('Checkout') {
		git([url: 'https://github.com/Wiejeben/PHP-Continuous-Integration/', branch: 'master'])
	}

	stage('Test') {
		try {
			sh 'phpunit --log-junit reports/phpunit/results.xml'
		} catch(err) {
			junit 'reports/**/*.xml'
			throw err
		}

		junit 'reports/**/*.xml'
	}
}