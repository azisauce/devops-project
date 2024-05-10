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
    stage('Deploying') {
      agent any
      steps {
        echo ' Deploying...'
        sh 'docker images'

      }
    }
  }
}
