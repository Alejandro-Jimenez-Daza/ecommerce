# Ecommerce PHP

<!-- captura de pantalla del proyecto -->
https://github.com/Alejandro-Jimenez-Daza/ecommerce/blob/c97941526f327a21969d4af746c31aebb339528a/2-example.png

Tienda en línea desarrollada con PHP puro, Bootstrap 5 y MySQL. Incluye autenticación con roles, carrito de compras con AJAX, integración real con Mercado Pago Checkout Pro y sistema de notificaciones webhook para persistir órdenes en base de datos.

---

## Tecnologías utilizadas

- PHP 8.2+
- MySQL
- Bootstrap 5.3
- JavaScript (Fetch API)
- Mercado Pago SDK PHP (via Composer)
- phpdotenv (via Composer)
- SweetAlert2
- HTML
- CSS

---

## Requisitos previos

Antes de instalar el proyecto necesitas tener:

- Un servidor local con PHP 8.2 o superior y MySQL. Puedes usar cualquiera de estos:
  - XAMPP: https://www.apachefriends.org
  - LAMPP (Linux): https://www.apachefriends.org/index.html
  - Laragon (Windows): https://laragon.org
  - WAMPP: https://www.wampserver.com
  - Cualquier otro que te permita tener estas dos herramientas principales.
- Composer instalado globalmente: https://getcomposer.org
- Una cuenta de Mercado Pago para desarrolladores: https://developers.mercadopago.com

---

## Instalación

### 1. Clonar el repositorio

Clona el proyecto dentro de la carpeta raíz de tu servidor local. En XAMPP o LAMPP esa carpeta es `htdocs`, en Laragon es `www`.

```bash
git clone https://github.com/alejandro-jimenez-daza/ecommerce.git
```

La ruta final debe quedar así: `htdocs/ecommerce/`

---

### 2. Importar la base de datos

1. Abre phpMyAdmin desde tu servidor local
2. Crea una base de datos nueva llamada `ecommerce`
3. Selecciona esa base de datos y ve a la pestaña "Importar"
4. Selecciona el archivo en la ruta: `model/ecommerce.sql` que está dentro del proyecto
5. Haz clic en "Continuar"

Esto creará todas las tablas necesarias: `usuarios`, `productos`, `ordenes` y `orden_detalle`.

---

### 3. Instalar dependencias de Composer

Abre una terminal en la raíz del proyecto y ejecuta:

```bash
composer install
```

Esto instalará el SDK de Mercado Pago y la librería phpdotenv dentro de la carpeta `vendor/`.

---

### 4. Configurar las variables de entorno

Copia el archivo .env.example, renómbralo a .env solamente:

```bash
cp .env.example .env
```

Abre el archivo `.env` y completa los valores:

```
DB_HOST=localhost
DB_NAME=ecommerce
DB_USER=root
DB_PASSWORD=

MP_ACCESS_TOKEN=tu_access_token_de_mercado_pago
MP_PUBLIC_KEY=tu_public_key_de_mercado_pago
URL_HOST=http://localhost
```

Puedes obtener tus credenciales de Mercado Pago en:
https://developers.mercadopago.com -> Tu aplicacion -> Credenciales

Para desarrollo usa las credenciales de prueba (sandbox), no las productivas.

---

### 5. Configurar permisos de la carpeta de imágenes

En Linux o Mac es necesario dar permisos de escritura a la carpeta donde se suben las imágenes de productos:

```bash
sudo chmod -R 777 resources/static/
```

En Windows con XAMPP o Laragon esto no es necesario.

---

### 6. Acceder al proyecto

Abre tu navegador y ve a:

```
http://localhost/ecommerce
```

---

## Uso

### Crear una cuenta

1. En la pantalla de inicio haz clic en "Crear cuenta"
2. Completa el formulario de registro
3. Inicia sesión con tus credenciales

Por defecto todos los usuarios nuevos tienen rol `user`. Para crear un usuario administrador debes cambiar el campo `rol` a `adm` directamente en la base de datos desde phpMyAdmin.

### Panel de administración

El panel de administración está disponible solo para usuarios con rol `adm`. Desde ahí puedes:

- Agregar, editar y eliminar productos
- Ver y gestionar usuarios

### Realizar un pago de prueba

Para probar el flujo de pago en modo sandbox usa las tarjetas de prueba que provee Mercado Pago:

- Tarjeta aprobada: `Tarjeta de vendedor de mercado pago de prueba`
- Código de seguridad: `123`
- Fecha de vencimiento: `11/30`
- Nombre del titular: `APRO`

Puedes consultar más tarjetas de prueba en tus integraciones de mercado pago developers.

### Webhooks en desarrollo local

Para recibir notificaciones de pago de Mercado Pago en tu entorno local necesitas exponer tu servidor con un servidor real (desplegar el proyecto) o, como yo, con una herramienta de tunnel. Se recomienda Tunnelmole:

```bash
npx tunnelmole 80
```

Copia la URL generada que sea https y actualiza la variable `URL_HOST` en tu archivo `.env`.

---

## Estructura del proyecto

```
ecommerce/
├── config/
│   ├── auth.php              — protege rutas de usuario autenticado
│   ├── auth_admin.php        — protege rutas de administrador
│   └── config.php            — define BASE_PATH y BASE_URL
├── controller/
│   ├── admin/                — controladores del panel admin
│   ├── cart/                 — controladores del carrito y checkout
│   ├── login/                — login y logout
│   └── register/             — registro de usuarios
├── model/
│   ├── conexionBD.php        — conexión PDO a MySQL
│   └── ecommerce.sql         — estructura e importacion de la base de datos
├── resources/
│   ├── css/                  — estilos por vista
│   ├── images/               — imágenes estáticas
│   ├── js/                   — scripts por vista
│   └── static/               — imágenes subidas de productos
├── view/
│   ├── adminPanel/           — vistas del panel de administración
│   └── *.php                 — vistas del usuario
├── vendor/                   — dependencias de Composer (no se sube a GitHub)
├── notifica.php              — webhook para notificaciones de Mercado Pago
├── .env                      — variables de entorno (no se sube a GitHub)
├── .env.example              — plantilla de variables de entorno
└── .gitignore
```

---

## Funcionalidades principales

- Registro e inicio de sesion con roles (usuario y administrador)
- Catalogo de productos con imagenes, precios y descripcion
- Carrito de compras persistente en sesion con actualizacion por AJAX y cantidad en navbar
- Checkout con Mercado Pago Checkout Pro
- Webhook para confirmar pagos y persistir ordenes en base de datos
- Descuento automatico de stock al confirmar un pago
- Panel de administracion para gestionar productos y usuarios
- Paginacion en el panel de productos
- Variables de entorno con phpdotenv

---

## Notas

- El archivo `.env` no se incluye en el repositorio por seguridad. Debes crearlo manualmente siguiendo el archivo `.env.example`.
- La carpeta `vendor/` tampoco se incluye. Se genera al ejecutar `composer install`.
- Este proyecto fue desarrollado con fines educativos y de portfolio.
