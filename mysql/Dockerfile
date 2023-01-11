FROM mysql:5.7

COPY ./init/* /docker-entrypoint-initdb.d/
COPY my.cnf /etc/mysql/my.cnf
COPY ./master-data /master-data

CMD ["mysqld"]
