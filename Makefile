# Makefile

# Define variables
IMAGE_NAME := my-php-app
APP_NAME := my-running-app

# Default target
all: build

# Target to build Docker image
build:
	docker compose up -d --build

# Target to run container 
run:
	docker run -d -p 8080:80 -v "$(PWD)/core/src:/var/www/html/" --rm --name $(APP_NAME) $(IMAGE_NAME)

down:
	docker compose down

# Target to clean up (optional)
clean:
	docker rmi $(IMAGE_NAME)
