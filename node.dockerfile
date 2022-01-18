FROM node:14.15

COPY package.json package-lock.json ./

RUN npm i

COPY resources resources
COPY www www
COPY webpack.mix.js .

CMD ["npm", "run", "watch"]