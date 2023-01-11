FROM mysql:5.7
COPY init/* /docker-entrypoint-initdb.d/
# COPY my.cnf /etc/mysql/conf.d/my.cnf
CMD ["mysqld"]
