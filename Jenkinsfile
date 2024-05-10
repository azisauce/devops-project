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
        sh 'docker-compose up --build'
      }
    }
    stage('Installing Composer Dependencies') {
            steps {
                script {
                    // Ensure Docker Compose is up
                    sh 'docker-compose up -d'

                    // Execute commands within the PHP container
                    sh '''
                        docker-compose exec php sh -c "
                            cd /var/www/html &&
                            composer install
                        "
                    '''
                }
            }
    stage('Deploying') {
      agent any
      steps {
        echo ' Deploying...'
        sh 'docker images'

      }
    }
  }
}
