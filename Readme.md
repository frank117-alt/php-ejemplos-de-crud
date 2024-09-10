------------------
hola  este es el proyecto 
------------------

se usa base de datos postgresql   por  ende el archivo 'prueba.sql' se transformo en sistesis.sql

1. se trabaja en sistema debian linux se usa el comando php -S localhost:8000
esto se corre en la raiz del directorio

2. relleno.sql es consultas para ingresar informacion a la nase de datos
3. tests carpeta donde se hacen pruebas unitarias  unsando phpunit

4. el archivo creacion se corre de esta forma para completaar el relleno de imformacion http://localhost:8000/creacion.php

5. pequeño error al eliminar 

 conectado2Error al eliminar: SQLSTATE[23503]: Foreign key violation: 7 ERROR: update or delete on table "ds_niveleducacion" violates foreign key constraint "ds_empleado_id_niveleducacion_fkey" on table "ds_empleado" DETAIL: Key (id)=(2) is still referenced from table "ds_empleado".
 http://localhost:8000/educacion/delete.php?id=2 
 solucion alterar la tabla para eliminar en forma de cascada o reasignar a otro id  ya que tuve dudas de si se debia de alterar la tabla 

 6. php --version
PHP 8.2.20 (cli) (built: Jun 17 2024 13:33:14) (NTS)
