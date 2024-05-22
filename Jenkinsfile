
pipeline {
  agent any

  stages {
    stage('Build') {
      steps {
        chmod +x 777 
        sh 'docker build -t phpimage .'
        sh 'docker tag phpapp $DOCKER_IMAGE'
      }
    }
    stage('Test') {
      steps {
        sh 'docker run phpimage python -m pytest app/tests/'
      }
    }
    stage('Deploy') {
      steps {
        withCredentials([usernamePassword(credentialsId: "${DOCKER_REGISTRY_CREDS}", passwordVariable: 'DOCKER_PASSWORD', usernameVariable: 'DOCKER_USERNAME')]) {
          sh "echo \$DOCKER_PASSWORD | docker login -u \$DOCKER_USERNAME --password-stdin docker.io"
          sh 'docker push $DOCKER_IMAGE'
        }
      }
    }
    
  }

post{
      always{
            sh 'docker rm -f mypycont'
            sh 'docker run --name phpcont -d -p 3000:80 phpimage'
            catchError(buildResult: 'SUCCESS', stageResult: 'FAILURE') {
            mail  to: "ganeshrajgr21@gmail.com",
                  subject: "Notification mail from Jenkins",
                  body: "CI/CD pipeline completed successfully.\n\nCheck the application"
                
                
        }
}

}
}

             
              
  

                 
    
  
    

  




             
