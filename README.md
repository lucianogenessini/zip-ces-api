# Zip-Codes API Challenge

API que a partir de un zip-code devuelve datos relacionados al mismo, como municipio, departamento y códigos. 

## Descripción de análisis del problema: 

* En primera instancia se analizó la respuesta obtendida por el endpoint de ejemplo de acuerdo a diferentes zip-codes. Con esto se logró tener un muestreo de diferntes respuestas que permitieron entender la estructura y las posibles relaciones. 

* En base a la fuente de infomarción proporcionada, desde donde obtendríamos los datos para construir la API, se fue constatando cada atributo obtenido el muestreo anteriormente mensionado con los atributos de la fuente de información. Fuente: [Atributos](https://www.correosdemexico.gob.mx/SSLServicios/ConsultaCP/imagenes/Descrip.pdf)

* Una vez entendida la fuente de datos y su significado, se elaboró una diagrama de clases a fin de entender el dominio del sistema. 

![alt text](https://github.com/lucianogenessini/zip-codes-api/blob/main/public/zip-code-challenge.png)


* Ya con el dominio resuelto, pasamos a contruir la api mensionada. Para la inserción de datos (seeders), se utilizó el archivo .xml que provee la fuente: [Fuente](https://www.correosdemexico.gob.mx/SSLServicios/ConsultaCP/CodigoPostal_Exportar.aspx)

## Para ejecutar el proyecto en local

```bash
composer install
```

```bash
php artisan migrate
```

```bash
php artisan db:seed
```
 
## Endpoint para pruebas
```bash
/api/zip-codes/{zip-code}
```

Puedes probar online en el siguiente link: [Online Sbx](https://zip-codes-api-challenge.herokuapp.com/api/zip-codes/50010)
