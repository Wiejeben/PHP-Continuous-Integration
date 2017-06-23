node {
	stage('Checkout') {
		git([url: 'https://github.com/Wiejeben/PHP-Continuous-Integration/', branch: 'master'])
	}

	stage('Test') {
		junit 'reports/**/*.xml'
		sh 'phpunit --log-junit reports/phpunit/results.xml'
	}
}