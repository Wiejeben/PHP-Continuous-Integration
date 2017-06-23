node {
	stage('Checkout') {
		git([url: 'https://github.com/Wiejeben/PHP-Continuous-Integration/', branch: 'master'])
	}

	stage('Composer') {
		sh 'composer install'
	}

	stage('Test') {
		sh 'cp .env.testing .env'

		try {
			sh 'phpunit --log-junit reports/phpunit/results.xml'
		} finally {
			junit 'reports/**/*.xml'
		}
	}

	stage('Frontend') {
		sh 'npm install'
		sh 'npm run production'
	}
}