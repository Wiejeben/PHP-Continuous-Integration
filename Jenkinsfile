node {
	stage('Checkout') {
		git branch: 'master', url: 'https://github.com/Wiejeben/PHP-Continuous-Integration/'
	}

	stage('PHP Lint') {
		sh 'find . -name "*.php" -print0 | xargs -0 -n1 php -l'
	}

	stage('Composer') {
		sh 'composer install'
	}

	stage('Test') {
		sh 'cp .env.testing .env'

		try {
			sh 'vendor/bin/phpunit --log-junit reports/phpunit/results.xml'
		} finally {
			junit 'reports/**/*.xml'
		}
	}

	stage('Frontend') {
		sh 'npm install'
		sh 'npm run production'
	}

	stage('Deploy') {
		// TODO
	}

	stage('Clean') {
		deleteDir()
	}
}