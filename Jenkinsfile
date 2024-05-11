pipeline {
  agent any
  stages {
    stage('Checking') {
      steps {
        
        // Checking docker working
        sh 'docker version'
        // Checking docker-compose working
        sh 'docker compose --version'
      }
    }
    stage('Building') {
      // Creating docker containers
      steps {
        sh 'docker compose up --build'
      }
    }
    stage('Installing Composer Dependencies') {
            steps {
                // Ensure Docker Compose is up
                    sh 'docker ccompose up -d'
                }
            }
  }
}
