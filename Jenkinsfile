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

                    // Execute commands within the PHP container
                    sh '''
                        docker-compose exec -T php sh -c "
                            ls &&
                            cd /var/www/html &&
                            ls
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
