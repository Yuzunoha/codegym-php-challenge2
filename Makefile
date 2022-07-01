.SILENT:
init:
	./rmdatabase.sh
	./mkenv.sh
	docker-compose build --no-cache
	make up
up:
	docker-compose up -d
	sleep 10
	./url.sh
down:
	docker-compose down
ps:
	docker-compose ps
dbpass:
	cat docker/db/password
	echo ""
