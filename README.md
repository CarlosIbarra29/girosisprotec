 ## Sistema Integral de Administración y Finanzas para el control del parque vehicular (SIAF)

## Plantilla Metronic 8.0.37

En la carpeta **/siaf/theme/** se localiza los archivos fuente de la plantilla, todos los assets de la plantilla se compilan con node.

**Instalación**:

Modificar el archivo: /siaf/theme/tools/webpack.config.js
en el bloque de código siguiente agregar la ruta completa de donde se ubicaran los assets compilados: 
```javascript
// ruta de los assets compilados del tema metronic
const assetDistPath =  '/xampp81/htdocs/siaf/public/theme/assets';
```  
En la carpeta **/siaf/theme/tools**  ejecutaremos los comandos de node.

Install the latest NPM
```bash
npm install --global npm@latest
``` 
Install Yarn via the NPM:

```bash
npm install --global yarn
```
Install the Metronic dependencies

```bash
yarn
```
Run the build taks to build the theme assets default build using Webpack

```bash
npm run build --demo1
```

 
**VIRTUAL HOST**
```shell script
<VirtualHost *:80>
   
    ServerAdmin root@siaf.localhost
    DocumentRoot "C:/xampp81/htdocs/siaf/public"
    ServerName siaf.localhost
	ServerAlias www.siaf.localhost.com
    ErrorLog "C:/xampp81/htdocs/siaf/storage/logs/siaf-error.log"
    CustomLog "C:/xampp81/htdocs/siaf/storage/logs/siaf-access.log" common
	
	<Directory C:/xampp81/htdocs/siaf/public>
		AllowOverride All
		Order Allow,Deny
		Allow from All
		
	</Directory>
</VirtualHost>

```

## PM2

Instala PM2 globalmente con el siguiente comando:

```shell script
npm install -g pm2
```

Para iniciar un proceso (en este caso server.js), ejecuta el siguiente comando:

```shell script
pm2 start server.js
```

Para configurar el inicio de tu aplicación en el arranque del sistema, usa:

```shell script
pm2 startup
```

Si necesitas deshabilitar el inicio automático, usa:

```shell script
pm2 unstartup
```

