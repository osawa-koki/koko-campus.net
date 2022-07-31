load data local
    infile '/home/webSite/dev/db/contents/subjects.csv'
 into table
    koko.subjects
 fields
    terminated by ','
    enclosed by '"';

CREATE USER 'koko'@'%' IDENTIFIED BY 'pw1234';