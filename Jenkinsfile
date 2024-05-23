pipeline {
  agent any

  environment {
    DOCKER_IMAGE = 'ganeshraj21/phpapp:latest'
    DOCKER_REGISTRY_CREDS = credentials('DOCKER_REGISTRY_CREDS')
  }

  stages {
    stage('Build') {
      steps {
        sh 'docker build -t phpimage .'
        sh 'docker tag phpimage $DOCKER_IMAGE'
      }
    }
    stage('Test') {
      steps {
        sh 'docker run -itd -p 3000:80 --name phpco1 phpimage'
      }
    }
    stage('Deploy') {
      steps {
        withCredentials([usernamePassword(credentialsId: "${DOCKER_REGISTRY_CREDS}", passwordVariable: 'DOCKER_PASSWORD', usernameVariable: 'DOCKER_USERNAME')]) {
          sh 'echo $DOCKER_PASSWORD | docker login -u $DOCKER_USERNAME --password-stdin'
          sh 'docker push $DOCKER_IMAGE'
        }
      }
    }
  }

  post {
    always {
      catchError(buildResult: 'SUCCESS', stageResult: 'FAILURE') {
        sh 'docker rm -f phpco1 || true'
        sh 'docker run --name phpco1 -d -p 3000:80 phpimage || true'
        mail to: "ganeshrajgr21@gmail.com",
             subject: "Notification mail from Jenkins",
             body: "CI/CD pipeline completed successfully.\n\nCheck the application."
      }
    }
  }
}
