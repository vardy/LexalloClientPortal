FROM node:11
MAINTAINER Jarred Vardy <jarred.vardy@gmail.com>
ENV ENV docker

COPY . /opt/Client.Portal/db-handler
WORKDIR /opt/Client.Portal/db-handler

RUN npm install

CMD [ "node", "--harmony", "./lib/index.js" ]