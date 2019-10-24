FROM node:10.6.0-alpine

RUN apk --update add git openssh curl

USER node

RUN git config --global user.email "git@newsite.by" && \
    git config --global user.name "Docker" && \
    git config --global push.default simple

WORKDIR /var/www/project

CMD yarn start-deploy-server
