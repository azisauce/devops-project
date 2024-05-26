pipeline {
  agent any
  stages {
    stage('Checking Docker and Docker Compose') {
      steps {
        
        // Checking docker working
        sh 'docker version'
        // Checking docker-compose working
        sh 'docker-compose --version'
      }
    }
    stage('Building Containers') {
      // Creating docker containers
      steps {
        sh 'docker-compose up --build -d'
      }
    }
    stage('Installing Composer Dependencies') {
            steps {
                    // Creating .env file
                    sh 'docker exec -t php /bin/bash -c \'cp .env.example .env\''
                    // Installing the Composer
                    sh 'docker exec -t php /bin/bash -c \'composer install\''
                    sh 'docker exec -t php /bin/bash -c \'php artisan key:generate\''
                    sh 'docker exec -t php /bin/bash -c \'chmod -R 777 \''
                }
     }
    stage('Configuring Database connection') {
            steps {
                    // Creating a database called laravel
                    sh 'docker exec -i db mysql -uroot -proot -e \'create database laravel;\''
                   // Connecting to the database
                    sh 'docker exec -t php /bin/bash -c \'php artisan migrate:refresh --seed\''

                }
            }
  }
}
