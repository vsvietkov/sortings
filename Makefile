imagename := vsvietkov-sortings
workdir := /sortings
LANG := php
ALG := BubbleSort

docker-run := docker run --rm -v ${PWD}:/$(workdir) $(imagename)

docker-build:
	@docker build --build-arg workdir=$(workdir) . -t $(imagename)

autoload:
	@$(docker-run) composer dump-autoload

run:
ifeq ($(LANG),php)
	@$(docker-run) php $(ALG)/PHP/main.php
else ifeq ($(LANG),go)
	@$(docker-run) go run $(ALG)/Go/main.go
endif
