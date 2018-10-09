FROM node:10.6.0-alpine

RUN apk --update add git openssh curl

USER node

RUN git config --global user.email "git@deploy.com" && \
    git config --global user.name "Deployguy" && \
    git config --global push.default simple

WORKDIR /var/www/project/deployment

CMD yarn start-deploy-server
