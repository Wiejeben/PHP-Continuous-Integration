node {
	stage('Checkout') {
		git([url: 'https://github.com/Wiejeben/PHP-Continuous-Integration/', branch: 'master'])
	}

	stage('Test') {
		sh 'echo "Hello World!"'
		sh 'phpunit --log-junit reports/phpunit/results.xml'
		junit 'reports/**/*.xml'
	}
}