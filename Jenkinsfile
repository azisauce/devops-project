pipeline {
  agent any
  stages {
    stage('Checking') {
      steps {
        
        // Checking docker working
        sh 'docker version'
        // Checking docker-compose working
        sh 'docker-compose --version'
      }
    }
    stage('Building') {
      // Creating docker containers
      steps {
        sh 'docker-compose up --build -d'
      }
    }
    stage('Installing Composer Dependencies') {
            steps {
                // Ensure Docker Compose is up
                    sh 'docker-compose up -d'
                    sh 'docker-compose exec -t php /bin/bash -c 'cd /var/www/html && cp .env.example .env && composer install'
                    sh 'php artisan key:generate'

                }
            }
  }
}
