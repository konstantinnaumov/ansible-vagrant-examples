pipeline {
    agent any
    stages {
        stage('deploy'){
            steps {
                sh 'echo DEPLOYING...'
                sh 'echo BUILD ID - ${BUILD_ID}'
                sh 'vagrant up --provision'
                sh 'echo DEPLOY STAGE OK'
            }
        }
    }
}
