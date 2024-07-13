# Makefile

# Define variables
IMAGE_NAME := my-php-app
APP_NAME := my-running-app

# Default target
all: build

# Target to build Docker image
build:
	docker build -t $(IMAGE_NAME) .

# Target to run container 
run:
	docker run -it --rm --name $(APP_NAME) $(IMAGE_NAME)

# Target to clean up (optional)
clean:
	docker rmi $(IMAGE_NAME)
