# Atlas Project
## API
The API is building using laravel 10 and php 8.2.
It uses phpunit for the test suite.

## Frontend
The frontend is built using vue 3, typescript and bootstrap 5.
It uses vitest for the test suite.

# Setup
1. Clone the repo `git clone git@github.com:joseph-t-martin/atlas.git`
2. Change to the directory `cd atlas`
3. Inside the api directory copy the .env.example file to .env `cp ./api/.env.example ./api/.env`
4. Add the atlas API key to the .env file 
5. Spin up the docker containers `docker-compose up -d`

# Testing
To Run Frontend tests:  
`docker-compose exec frontend npm run test:unit`

To Run API tests:  
`docker-compose exec api php /usr/src/api/vendor/phpunit/phpunit/phpunit`
# Future Improvements
1. API - Add a caching layer to the API
2. API - Add more Integration tests to the API
3. Frontend - Move the API url to an environment variable
4. Frontend - Add a loading state while waiting for API to return data
5. Frontend - Increase test coverage for the frontend
