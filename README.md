# Cliente_Servidor
Programa de ejemplo para visualizar la comunicación entre un sistema Cliente - Servidor

Tecnologías en uso

- HTML
- CSS
- Javascript
- PHP
- PHPUnit (Framework para pruebas unitarias)
- XAMPP (https://www.apachefriends.org/es/index.html)
- Apache
- MariaDB


## Uso de dominios
### Agregar entradas de dominio a archivo hosts
El archivo hosts nos permite resolver localmente dominios a IPs, de forma que podamos probar localmente usando nombre de dominio que no
necesariamente existen en la Internet. (https://es.wikipedia.org/wiki/Archivo_hosts)

Vamos a crear los siguientes registros en el archivo hosts para poder acceder al:
- API con http://api.clienteservidor.ue
- Cliente con http://clienteservidor.ue

Agrega al final de tu archivo hosts lo siguiente:
```
127.0.0.1 api.clienteservidor.ue
127.0.0.1 clienteservidor.ue
```

### Agregar hosts virtuales a Apache
Agrega las siguientes entradas al archivo httpd.conf de tu servidor Apache

```xml
<VirtualHost *:80>
    ServerAdmin admin@correoadmin.com
    DocumentRoot "C:/xampp/htdocs/proys/Cliente_Servidor/servidor" #Cambia esta ruta por la tuya
    ServerName api.clienteservidor.ue
    ServerAlias api.clienteservidor.ue
    ErrorLog "logs/ClienteServidor-error.log"
    CustomLog "logs/ClienteServidor-access.log" common
</VirtualHost>

<VirtualHost *:80>
    ServerAdmin admin@correoadmin.com
    DocumentRoot "C:/xampp/htdocs/proys/Cliente_Servidor/cliente" #Cambia esta ruta por la tuya
    ServerName clienteservidor.ue
    ServerAlias clienteservidor.ue
    ErrorLog "logs/ClienteServidor-error.log"
    CustomLog "logs/ClienteServidor-access.log" common
</VirtualHost>
```

## Instalar Composer
Composer es un gestor de paquetes para PHP que nos ayuda con la gestión de algunas dependencias que necesitamos, como:
- PHPUnit (https://phpunit.de/)
- Guzzle (https://github.com/guzzle/guzzleg)

Para instalar Composer, sigue las instrucciones en: https://getcomposer.org/

## Diseño
### Colores
Generados por https://paletton.com/#uid=10l0u0kswAChIKpn6Es-5tLAYn1
