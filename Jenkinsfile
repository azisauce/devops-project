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
                    sh 'docker exec -t php /bin/bash -c 'cp .env.example .env''
                    sh 'docker exec -t php /bin/bash -c 'composer install''
                    sh 'php artisan key:generate'

                }
            }
  }
}
