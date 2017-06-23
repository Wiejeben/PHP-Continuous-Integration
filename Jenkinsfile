pipeline {
	agent any

	stages {
		stage('Test') {
			steps {
				sh 'phpunit --log-junit reports/phpunit/results.xml'
				junit 'reports/**/*.xml'
			}
		}
	}
}