FROM node:lts-alpine

WORKDIR /frontend
COPY frontend .
RUN npm install
CMD ["npm", "run", "dev"]