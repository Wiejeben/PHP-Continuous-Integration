pipeline {
	agent any

	stages {
		stage('Checkout') {
			git([url: 'https://github.com/Wiejeben/PHP-Continuous-Integration/', branch: 'master'])
		}

		stage('Test') {
			steps {
				sh 'phpunit --log-junit reports/phpunit/results.xml'
				junit 'reports/**/*.xml'
			}
		}
	}
}