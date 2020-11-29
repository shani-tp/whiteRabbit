### Preparing application

* git clone 
* go into project root directory copy the .env.dist file and save as .env to the root
* modify .env file accorinng to your db configuration

example:

# Databases
# ---------
DB_DSN=mysql:host=127.0.0.1;port=3306;dbname=sampledbname
DB_USERNAME=username
DB_PASSWORD=password
DB_TABLE_PREFIX=
DB_CHARSET=utf8mb4

# Urls
# ----

FRONTEND_HOST_INFO=http://example_frontend.dev

* set up virtualhost for this application http://example_frontend.dev


* php console/yii app/setup
* npm install
* npm run build


