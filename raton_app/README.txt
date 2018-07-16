Descomprimir el raton_app.zip

Entrar al archivo common/Conexion.php

Allí modificar los parámetros según sean necesarios

mysql:host=localhost (en caso la bd y el server estén en el mismo host no modificar)
dbname=ratoneras (cambiar con el nombre de la bd o esquema)
"root","" (cambiar por el nombre de usuario y contraseña de la bd)

IMPORTANTE: Colocar el raton_app dentro de /var/www/html/
de tal manera que el android se comunique apuntando a estas dos direcciones
http://192.34.60.5/raton_app/select_ratonera.php
http://192.34.60.5/raton_app/verify_point.php
