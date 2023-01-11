# !/bin/bash

# category
mysql -u root --password=root_password --local-infile koko_campus -e "LOAD DATA LOCAL INFILE '/master-data/category.csv' INTO TABLE category FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n'"

# games
mysql -u root --password=root_password --local-infile koko_campus -e "LOAD DATA LOCAL INFILE '/master-data/games.csv' INTO TABLE games FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n'"
