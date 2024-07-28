FROM mysql:9

# Define credentials + DB name
ENV MYSQL_ROOT_PASSWORD=@ssw0rd
ENV MYSQL_USER=mysql
ENV MYSQL_PASSWORD=mysql
ENV MYSQL_DATABASE=app

# Initialization scripts
# Copy the SQL file, CSV file, and initialization script into the Docker container
COPY init.sql /docker-entrypoint-initdb.d/
COPY data.csv /docker-entrypoint-initdb.d/
COPY init-database.sh /docker-entrypoint-initdb.d/

# Make the initialization script executable
RUN chmod +x /docker-entrypoint-initdb.d/init-database.sh

# TODO: Setup tests database
# Use a non-root user
USER mysql

# Expose the default MySQL port
EXPOSE 3306

# Use the default entrypoint provided by the MySQL image
ENTRYPOINT ["docker-entrypoint.sh"]

# Set the default command to run MySQL server
CMD ["mysqld"]