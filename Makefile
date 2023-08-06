imagename := vsvietkov-sortings
workdir := /sortings
ALG := BubbleSort

docker-run := docker run --rm -v ${PWD}:/$(workdir) $(imagename)

docker-build:
	@docker build --build-arg workdir=$(workdir) . -t $(imagename)

autoload:
	@$(docker-run) composer dump-autoload

run:
	@$(docker-run) php $(ALG)/PHP/main.php
