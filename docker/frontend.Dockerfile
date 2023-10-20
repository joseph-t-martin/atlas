FROM node:lts
WORKDIR /frontend
COPY ./frontend/package.json .
RUN npm i
COPY frontend .
CMD ["npm", "run", "dev"]
