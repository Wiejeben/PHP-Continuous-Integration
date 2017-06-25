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
		sh 'npm install || true'
		sh 'npm rebuild node-sass'
		sh 'npm run production || true'
	}

	stage('Deploy') {
		def livedir = '/srv/users/serverpilot/apps/project/'

		dir(livedir) {
			git branch: 'master', url: 'https://github.com/Wiejeben/PHP-Continuous-Integration/'
		}

		sh "rm -r ${livedir}node_modules && rm -r ${livedir}vendor"
		sh "cp -r ./vendor ${livedir} && cp -r ./node_modules ${livedir}"

		dir(livedir) {
			sh "npm run production"
			sh "php artisan clear-compiled && php artisan optimize && php artisan cache:clear"
		}
	}
}