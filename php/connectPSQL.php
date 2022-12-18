<?php
  $PW = apache_getenv('PSQL_PASSWORD');
  $CONN = pg_connect("host=localhost port=5432 dbname=library user=squall password=$PW");
    if (!$CONN) {
        echo 'Error connecting to Postgres';
    }
?>
