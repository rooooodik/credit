FROM node:9.4-alpine

RUN npm install -g http-server

RUN mkdir -p /usr/src/client

WORKDIR /usr/src/client

COPY package.json yarn.lock ./

RUN yarn install

COPY . ./

RUN yarn build

EXPOSE 8080
CMD [ "http-server", "dist" ]
