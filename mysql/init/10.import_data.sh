# !/bin/bash

tables=()
tables+=("category")
tables+=("games")
tables+=("programs")

for table in "${tables[@]}"
do
  mysql -u root --password=root_password --local-infile koko_campus -e "LOAD DATA LOCAL INFILE '/master-data/$table.csv' INTO TABLE $table FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n' IGNORE 1 LINES"
done
