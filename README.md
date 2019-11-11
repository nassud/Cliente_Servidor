# Cliente_Servidor
Programa de ejemplo para visualizar la comunicación entre un sistema Cliente - Servidor

Tecnologías en uso

- HTML
- CSS
- Javascript
- PHP
- PHPUnit (Framework para pruebas unitarias)
- MariaDB


## Uso de dominios
### Agregar entradas de dominio a archivo hosts
127.0.0.1 api.clienteservidor.ue
127.0.0.1 clienteservidor.ue

### Agregar hosts virtuales a Apache
<VirtualHost *:80>
    ServerAdmin admin@correoadmin.com
    DocumentRoot "C:/xampp/htdocs/proys/Cliente_Servidor/servidor"
    ServerName api.clienteservidor.ue
    ServerAlias api.clienteservidor.ue
    ErrorLog "logs/ClienteServidor-error.log"
    CustomLog "logs/ClienteServidor-access.log" common
</VirtualHost>

<VirtualHost *:80>
    ServerAdmin admin@correoadmin.com
    DocumentRoot "C:/xampp/htdocs/proys/Cliente_Servidor/cliente"
    ServerName clienteservidor.ue
    ServerAlias clienteservidor.ue
    ErrorLog "logs/ClienteServidor-error.log"
    CustomLog "logs/ClienteServidor-access.log" common
</VirtualHost>
