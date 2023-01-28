pipeline {
    agent any
    stages {
        stage('Build'){
            steps {
                sh 'echo BUILDING...'
                sh 'echo BUILD ID - ${BUILD_ID}'
                sh 'echo BUILD STAGE OK'
            }
        }
        stage('Test'){
            steps {
                sh 'echo TESTING...'
            }
        }
        stage('Deploy'){
            steps {
                sh 'echo DEPLOYING...'
                sh 'cd /home/Exam_project/vaw-0.8.8 Centos/; vagrant reload --provision'
                sh 'echo DEPLOY STAGE OK'
            }
        }
    }
}
