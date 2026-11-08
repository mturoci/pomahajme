FROM node:18.18

WORKDIR /app

COPY package.json package-lock.json ./

RUN npm ci

COPY resources resources
COPY www www
COPY webpack.mix.js .
COPY tailwind.config.js .
COPY postcss.config.js .

CMD ["npm", "run", "watch"]