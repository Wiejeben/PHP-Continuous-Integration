node {
	stage('Checkout') {
		git branch: 'master', url: 'https://github.com/Wiejeben/PHP-Continuous-Integration/'
	}

	stage('PHP Lint') {
		sh 'find . -path ./vendor -prune -o -name "*.php" -print0 | xargs -0 -n1 php -l'
	}

	stage('Composer') {
		sh 'composer install'
	}

	stage('Test') {
		sh 'cp .env.testing .env'

		try {
			sh 'vendor/bin/phpunit --log-junit reports/phpunit/results.xml'
		} catch (err) {
			junit 'reports/**/*.xml'
			throw err
		} finally {
			junit 'reports/**/*.xml'
		}

		// TODO: Catch err
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
			sh "rm -r ./node_modules && rm -r ./vendor"
		}

		sh "cp -r ./vendor ${livedir} && cp -r ./node_modules ${livedir}"

		dir(livedir) {
			sh "npm run production"
			sh "php artisan clear-compiled && php artisan optimize && php artisan cache:clear"
		}
	}
}