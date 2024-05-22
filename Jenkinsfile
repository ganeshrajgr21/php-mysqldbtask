pipeline {
    agent any

    environment {
        DOCKER_IMAGE = 'ganeshraj21/phpmysqldb:phpapp'
        DEPLOY_SERVER = 'http://3.80.125.199:8080'
        DEPLOY_USER = 'ec2-user'
        DEPLOY_PATH = 'ec2-3-80-125-199.compute-1.amazonaws.com'
    }

    stages {
        stage('Clone Repository') {
            steps {
                git 'https://github.com/ganeshrajgr21/php-mysqldbtask.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    docker.build(phpimage, '.')
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                script {
                    docker.withRegistry('https://index.docker.io/v1/', 'docker-hub-credentials') {
                        docker.image(phpapp1).push()
                    }
                }
            }
        }

        stage('Deploy') {
            steps {
                script {
                    sshagent('C:\Users\HP\.ssh\n.virginiapemkey.pem') {
                        sh """
                        ssh -o StrictHostKeyChecking=no $DEPLOY_USER@$DEPLOY_SERVER << EOF
                        docker pull $phpimage
                        docker stop php-app || true
                        docker rm php-app || true
                        docker run -d --name phpapp -p 80:80 -v $DEPLOY_PATH:ec2-3-80-125-199.compute-1.amazonaws.com $phpimage
                        EOF
                        """
                    }
                }
            }
        }
    }

    post {
        success {
            echo 'Deployment was successful!'
        }
        failure {
            echo 'Deployment failed.'
        }
    }
}
