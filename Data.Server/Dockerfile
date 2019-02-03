FROM node:11
MAINTAINER Jarred Vardy <jarred.vardy@gmail.com>
ENV ENV docker

COPY . /opt/Client.Portal/Data.Server
WORKDIR /opt/Client.Portal/Data.Server

RUN npm install

CMD [ "npm", "start" ]