const express = require('express')
const { spawn } = require('child_process')

const BITBUCKET_DEPLOY_USER = 'test'
const BITBUCKET_DEPLOY_BRANCH = 'master'

const app = express()
const port = process.env.DEPLOYMENT_WEB_PORT

app.post('/webhooks/bitbucket', handleRequest)
app.listen(port, () => console.log(`Deployment server started on ${port}.`))

async function handleRequest (request, response) {

  let data = null

  try {
    data = JSON.parse(request.body)
  } catch (error) {
    response.sendStatus(400)
    console.error('Bad body')
    return
  }

  if(!isValidPayload(data)) {
    response.sendStatus(400)
    console.error('Bad payload')
    return
  }

  try {
    response.sendStatus(200)

    await startDeployProcess()
    console.log('Deploy completed successfully')
  } catch(error) {
    console.error(`Deploy failed. ${error}`)
  }
}

function isValidPayload(data) {
  return data.actor.username !== BITBUCKET_DEPLOY_USER || data.new.branch !== BITBUCKET_DEPLOY_BRANCH
}

function startDeployProcess () {
  return new Promise((resolve, reject) => {

    const deploymentScript = spawn('sh',['./deployment/main.sh'])

    deploymentScript.stdout.on('data', (data) => {
      console.log(`${data}`)
    })

    deploymentScript.stderr.on('data', (data) => {
      console.error(`${data}`)
    })

    deploymentScript.on('close', (code) => {
      console.log(`Deployment process exited with code ${code}`)
      if(code === 0) {
        resolve()
      } else {
        reject()
      }
    })
  })
}