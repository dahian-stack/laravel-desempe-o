Para iniciar sesion como administrador :) ->
Email = kdzapata17@gmail.com
Contraseña = mediapro

Link video explicacion -> https://drive.google.com/file/d/1t5PW7A6ttkycMuxv_pzJWcFniW-gRZG8/view?usp=drivesdk

# MEDIAPRO – Sistema de gestión audiovisual

**Estudiante:** Karol Zapata  
**Proyecto:** MEDIAPRO – ImagenesCreativas - Producto

---

## 1. Descripción general

MEDIAPRO es una aplicación web desarrollada para una empresa ficticia del sector audiovisual, orientada a la administración y seguimiento de proyectos de producción audiovisual.

La plataforma permite gestionar clientes, producciones, personal, equipos técnicos, localizaciones, planes de rodaje y escenas desde un entorno centralizado.

El sistema cuenta con dos tipos de usuarios:

- **Administrador:** tiene acceso al panel administrativo y puede realizar operaciones de creación, consulta, actualización y eliminación de los registros de los diferentes módulos.
- **Cliente:** dispone de un portal privado desde el cual puede consultar sus producciones y realizar seguimiento de la información relacionada, sin acceso a las funciones administrativas.

La aplicación también incorpora autenticación, protección de datos personales, almacenamiento externo, envío de correos electrónicos, monitoreo de disponibilidad y seguimiento de errores.

## 2. Tecnologías y servicios utilizados

### Tecnologías principales

| Tecnología | Utilización |
|---|---|
| PHP | Lenguaje de programación del backend. |
| Laravel | Framework principal de desarrollo. |
| MySQL | Sistema de gestión de bases de datos. |
| Blade | Motor de plantillas para las vistas. |
| HTML5 | Estructura de las páginas web. |
| CSS3 | Diseño y estilos de la interfaz. |
| JavaScript | Funcionalidades e interacciones del frontend. |
| Tailwind CSS | Estilos y componentes de interfaz. |
| Laravel Breeze | Autenticación y gestión de sesiones. |
| Composer | Administración de dependencias PHP. |
| NPM | Administración de dependencias frontend. |
| Git y GitHub | Control de versiones y alojamiento del código fuente. |

### Servicios externos

| Servicio | Función |
|---|---|
| Render | Despliegue y alojamiento de la aplicación web. |
| Aiven | Alojamiento de la base de datos MySQL. |
| Resend | Envío de correos electrónicos desde el formulario de contacto. |
| Better Stack | Monitoreo de disponibilidad y notificaciones de interrupciones. |
| Backblaze B2 | Almacenamiento externo de archivos y respaldos. |
| Sentry | Registro, seguimiento y análisis de errores de la aplicación. |
| Cron-job.org | Ejecución programada del proceso automático de respaldo. |

## 3. Estructura de la base de datos

La aplicación utiliza una base de datos MySQL para almacenar la información de usuarios, clientes y operaciones relacionadas con la producción audiovisual.

Entre sus principales tablas se encuentran:

| Tabla | Descripción |
|---|---|
| users | Almacena las cuentas de usuario, credenciales, roles y fotografía de perfil. |
| cliente | Registra la información de los clientes asociados a la plataforma. |
| produccion | Almacena los proyectos y producciones audiovisuales. |
| personal | Contiene la información del personal involucrado en las producciones. |
| equipo_tecnico | Registra los equipos técnicos utilizados. |
| localizacion | Almacena los lugares donde se realizan las grabaciones. |
| plan_rodaje | Contiene la planificación de las jornadas de rodaje. |
| escena | Almacena la información de las escenas de cada producción. |

La base de datos también incluye las tablas auxiliares y de autenticación generadas por Laravel.

### Relaciones principales

- **Usuarios y clientes:** un usuario puede estar asociado a un registro de cliente mediante la columna `user_id`.
- **Clientes y producciones:** un cliente puede tener varias producciones relacionadas mediante `ID_cliente`.
- **Producciones y escenas:** las escenas se relacionan con las producciones correspondientes.
- **Producciones y planes de rodaje:** los planes de rodaje permiten organizar las actividades asociadas a las producciones.

Las relaciones se implementan mediante los modelos Eloquent de Laravel y las claves correspondientes de la base de datos.

## 4. Instalación y ejecución local

### Requisitos previos

- PHP 8.3 o superior.
- Composer.
- MySQL.
- Node.js y NPM.
- Git.

### Pasos de instalación

**1. Clonar el repositorio**

```bash
git clone https://github.com/dahian-stack/laravel-desempe-o.git
```

**2. Entrar en el directorio del proyecto**

```bash
cd laravel-desempe-o
```

**3. Instalar dependencias de PHP**

```bash
composer install
```

**4. Instalar dependencias frontend**

```bash
npm install
```

**5. Crear el archivo de variables de entorno**

Copiar `.env.example` y crear un archivo `.env` con la configuración local.

**6. Generar la clave de la aplicación**

```bash
php artisan key:generate
```

**7. Configurar la conexión a MySQL**

Crear la base de datos local y completar las variables de conexión en `.env`.

**8. Ejecutar las migraciones**

```bash
php artisan migrate
```

Si el proyecto dispone de datos de prueba mediante seeders, se pueden ejecutar según la configuración correspondiente.

**9. Compilar los recursos frontend**

```bash
npm run build
```

**10. Iniciar el servidor local**

```bash
php artisan serve
```

La aplicación estará disponible en:

`http://127.0.0.1:8000`

## 5. Variables de entorno

La aplicación utiliza variables de entorno para separar la configuración del código fuente y proteger las credenciales de los servicios externos.

Las siguientes variables deben configurarse según el entorno de ejecución:

### Aplicación

```env
APP_NAME=MEDIAPRO
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000
```

### Base de datos

```env
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=3306
DB_DATABASE=mediapro
DB_USERNAME=
DB_PASSWORD=
```

### Sesiones

```env
SESSION_DRIVER=file
SESSION_SECURE_COOKIE=false
```

En producción, los valores de seguridad y la URL deben ajustarse al dominio HTTPS correspondiente.

### Backblaze B2

```env
B2_KEY_ID=
B2_APPLICATION_KEY=
B2_REGION=us-east-005
B2_BUCKET=mediapro-archivos
B2_ENDPOINT=https://s3.us-east-005.backblazeb2.com
```

### Resend

```env
RESEND_API_KEY=
```

### Sentry

```env
SENTRY_LARAVEL_DSN=
```

### Respaldos automáticos

```env
BACKUP_TOKEN=
```

**Importante:** los valores de las credenciales, contraseñas, tokens, claves privadas y DSN deben mantenerse protegidos. El archivo `.env` no debe publicarse en GitHub. En producción, estas variables se configuran mediante las variables de entorno del servicio de alojamiento.

## 6. Integraciones externas

### 6.1. Resend – Envío de correos electrónicos

Se integró Resend para gestionar el envío de mensajes desde el formulario de contacto de MEDIAPRO.

Cuando un visitante completa el formulario, la aplicación valida la información recibida y envía el mensaje al correo de contacto de la empresa.

Características implementadas:

- Validación de los campos del formulario.
- Autorización para el tratamiento de los datos enviados.
- Protección mediante campo honeypot.
- Limitación de solicitudes para reducir el envío automatizado de mensajes.
- Envío mediante la API HTTP de Resend.
- Verificación del estado de entrega de los mensajes.

El correo de destino configurado es `mediapro.contacto@gmail.com`.

### 6.2. Better Stack – Monitoreo de disponibilidad

Se implementó Better Stack para supervisar la disponibilidad de la aplicación desplegada.

El servicio realiza comprobaciones periódicas de la dirección pública de MEDIAPRO y permite identificar interrupciones del servicio.

Características:

- Monitor de disponibilidad de la aplicación.
- Comprobaciones periódicas cada cinco minutos.
- Identificación de interrupciones.
- Notificaciones por correo electrónico cuando se presentan alertas.
- Seguimiento del estado del servicio.

### 6.3. Backblaze B2 – Almacenamiento externo

Se integró Backblaze B2 como servicio de almacenamiento externo compatible con la API S3.

La conexión se realiza desde Laravel mediante el sistema de archivos Flysystem y el adaptador de almacenamiento S3.

Características:

- Configuración de un disco externo denominado `b2`.
- Almacenamiento de archivos fuera del servidor de aplicación.
- Carga y recuperación de archivos.
- Verificación de existencia e integridad del contenido.
- Almacenamiento de respaldos de la base de datos y archivos de la aplicación.
- Almacenamiento de fotografías de perfil.

La integración se probó mediante una operación de carga, consulta y recuperación de un archivo de prueba.

### 6.4. Sentry – Seguimiento de errores

Se integró Sentry mediante el SDK de Laravel para identificar y registrar errores producidos durante la ejecución de la aplicación.

Características:

- Captura de excepciones.
- Registro de eventos de error.
- Consulta de detalles técnicos de los incidentes.
- Seguimiento de errores desde el panel de Sentry.
- Prueba de conexión mediante el comando de prueba del SDK.

La configuración prioriza la protección de los datos personales y evita habilitar información sensible innecesaria.

## 7. Respaldos automáticos

MEDIAPRO incorpora un mecanismo de respaldo que permite almacenar copias de seguridad en Backblaze B2.

El proceso incluye:

- Exportación de la estructura y los registros de la base de datos.
- Copia de los archivos contemplados en el proceso de respaldo.
- Generación de un manifiesto de respaldo.
- Verificación de los archivos generados.
- Almacenamiento externo en Backblaze B2.

La ejecución automática se programa mediante Cron-job.org, que realiza una solicitud HTTP autenticada al endpoint de respaldo de la aplicación.

El endpoint utiliza un token secreto y limitación de solicitudes para proteger su ejecución.

## 8. Privacidad y protección de datos personales

MEDIAPRO incorpora funcionalidades orientadas a la protección de los datos personales de acuerdo con los principios de la Ley 1581 de 2012 de Colombia.

Entre las medidas implementadas se encuentran:

- Política de tratamiento de datos personales.
- Información sobre las finalidades del tratamiento.
- Autorización para el tratamiento de datos en los formularios correspondientes.
- Validación de los datos recibidos.
- Protección de rutas mediante autenticación y autorización por roles.
- Separación de permisos entre administradores y clientes.
- Protección de credenciales y secretos mediante variables de entorno.
- Limitación de solicitudes en endpoints sensibles.
- Opciones de gestión y eliminación de cuentas.

### Eliminación de cuentas

La aplicación incorpora una funcionalidad para que el usuario pueda solicitar la eliminación de su cuenta desde la sección de perfil, previa confirmación de su contraseña.

El proceso contempla la eliminación de las credenciales de acceso y la desvinculación del registro de cliente mediante la relación `user_id`, con el propósito de conservar el historial de producciones asociado cuando corresponda.

La información histórica de la operación audiovisual se mantiene separada de las credenciales de acceso, de acuerdo con la lógica de conservación de los registros del sistema.

## 9. Seguridad y control de acceso

La aplicación utiliza Laravel Breeze para la autenticación y un sistema de roles para controlar el acceso a las funcionalidades.

Los permisos se distribuyen de la siguiente manera:

**Administrador:**
- Acceso al panel administrativo.
- Gestión de clientes.
- Gestión de producciones.
- Gestión de personal.
- Gestión de equipos técnicos.
- Gestión de localizaciones.
- Gestión de planes de rodaje.
- Gestión de escenas.

**Cliente:**
- Acceso a su portal privado.
- Consulta de sus producciones.
- Seguimiento de la información relacionada.
- Acceso a la gestión de su perfil.

Las rutas administrativas están protegidas mediante middleware de autenticación y autorización por rol.

## 10. Despliegue

La aplicación se encuentra preparada para su despliegue en Render, utilizando Aiven como proveedor de base de datos MySQL.

La configuración de producción utiliza variables de entorno independientes para las credenciales de la base de datos, almacenamiento externo, correo electrónico y seguimiento de errores.

**Dirección pública:**  
https://imagenescreativas.online

**Repositorio:**  
https://github.com/dahian-stack/laravel-desempe-o

---

## 11. Autor

**Karol Zapata**  
Proyecto académico: MEDIAPRO – ImagenesCreativas.
