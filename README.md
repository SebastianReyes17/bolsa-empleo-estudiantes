# EmpleaU — Bolsa de Empleo para Estudiantes

Primera entrega académica desarrollada con **Laravel 12 + Blade + SQLite**. La aplicación permite conectar estudiantes con empresas y hacer seguimiento básico a las postulaciones.

## Funcionalidades incluidas

- Página de inicio con presentación del proyecto.
- Registro e inicio de sesión con dos tipos de cuenta: estudiante y empresa.
- Perfil editable (programa académico, teléfono y descripción).
- Catálogo de vacantes con filtros por palabra clave, ubicación y modalidad.
- Detalle de cada vacante y formulario para postularse.
- Panel de estudiante con postulaciones y estados.
- Panel de empresa para publicar, editar y desactivar vacantes.
- Vista de candidaturas recibidas y actualización de estado: En revisión, Preseleccionado, Rechazado o Seleccionado.
- Datos de demostración para mostrar el sistema desde el primer inicio.

## Requisitos

- PHP 8.2 o superior.
- Composer 2.
- Extensiones PHP habituales de Laravel: `pdo`, `pdo_sqlite`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `fileinfo`.

## Instalación en Windows (PowerShell)

1. Descomprime el ZIP en una carpeta, por ejemplo `C:\proyectos\bolsa-empleo-estudiantes`.
2. Abre esa carpeta en Visual Studio Code.
3. Abre la terminal en la carpeta del proyecto y ejecuta:

```bash
composer install
```

4. Crea el archivo de entorno:

```powershell
Copy-Item .env.example .env
```

5. Genera la llave de Laravel:

```bash
php artisan key:generate
```

6. Crea el archivo SQLite vacío (si no existe):

```powershell
New-Item -ItemType File -Path database/database.sqlite -Force
```

7. Ejecuta las migraciones y los datos de demostración:

```bash
php artisan migrate --seed
```

8. Inicia el servidor:

```bash
php artisan serve
```

9. Abre `http://127.0.0.1:8000`.

> Esta primera entrega utiliza CSS propio y no necesita ejecutar Node/Vite para mostrar la interfaz. La sesión se guarda en archivos y la caché en memoria, por lo que no necesitas crear tablas adicionales para estos servicios.

## Cuentas de demostración

| Tipo | Correo | Contraseña |
|---|---|---|
| Estudiante | `estudiante@demo.com` | `password` |
| Empresa | `empresa@demo.com` | `password` |

Puedes registrar cuentas nuevas desde la pantalla de registro. Para la demostración, la selección del tipo de cuenta está abierta; en una versión de producción debe validarse el alta de empresas.

## Estructura principal

- `app/Models`: User, Job y Application.
- `app/Http/Controllers`: autenticación, vacantes, postulaciones, panel y perfil.
- `database/migrations`: estructura de usuarios, vacantes y postulaciones.
- `database/seeders`: datos iniciales para la demostración.
- `resources/views`: interfaz Blade.
- `routes/web.php`: rutas web.

## Alcance y siguientes mejoras sugeridas

Esta entrega es una base funcional para presentar el flujo principal. Antes de ponerla en producción se recomienda agregar verificación de correo, recuperación de contraseña, autorización más granular mediante Policies, carga segura de hojas de vida, paginación de candidaturas, validación de empresas, pruebas automatizadas y protección antispam. La mensajería y las recomendaciones automáticas no están implementadas todavía.
