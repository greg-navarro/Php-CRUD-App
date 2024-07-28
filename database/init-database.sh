#!/bin/bash
set -e

# Wait until MySQL server is available
until mysql -h "localhost" -u "root" -p"$MYSQL_ROOT_PASSWORD" -e "SELECT 1"; do
  >&2 echo "MySQL is unavailable - sleeping"
  sleep 1
done

# Source the SQL file to create tables
mysql -h "localhost" -u "root" -p"$MYSQL_ROOT_PASSWORD" "$MYSQL_DATABASE" < /docker-entrypoint-initdb.d/init.sql

# Load the CSV data into the 'users' table
mysql -h "localhost" -u "root" -p"$MYSQL_ROOT_PASSWORD" "$MYSQL_DATABASE" -e "
LOAD DATA LOCAL INFILE '/docker-entrypoint-initdb.d/data.csv'
INTO TABLE users
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;
"

echo "Database initialization complete."
