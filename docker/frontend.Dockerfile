FROM node:lts-alpine

WORKDIR /frontend
COPY ./frontend/package.json .
RUN npm i
COPY frontend .
CMD ["npm", "run", "dev"]
