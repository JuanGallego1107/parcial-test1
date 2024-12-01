# API REST para Gestión de Tareas CRUD

## 1. Descripción del Proyecto

Este proyecto es una **API REST** desarrollada con **PHP** y el framework **Laravel**. Su objetivo principal es proporcionar un sistema sencillo y eficiente para la gestión de tareas, permitiendo realizar operaciones CRUD (Crear, Leer, Actualizar y Eliminar) sobre ellas. La API está diseñada para ser utilizada por aplicaciones frontend que necesiten gestionar tareas y consultar la información asociada de manera estructurada.

## 2. Requisitos

Antes de comenzar con la instalación, asegúrate de tener los siguientes requisitos previos:

- **Docker**: Herramienta para crear, desplegar y ejecutar aplicaciones dentro de contenedores.
- **Docker Compose**: Herramienta para definir y ejecutar aplicaciones Docker multi-contenedor.
- **PHP**: Versión 8.2 o superior.
- **Laravel**: Framework PHP utilizado para desarrollar la API.

## 3. Instrucciones de Instalación

### Clonación del Repositorio

Para clonar el repositorio, ejecuta el siguiente comando en tu terminal:

```bash
git clone https://github.com/tu-usuario/parcial_test1.git
cd parcial_test1

# Copiar archivo de configuración de entorno
cp .env.example .env

# Construir y levantar contenedores en segundo plano
docker compose up -d --build

# Ejecutar migraciones de base de datos
docker compose exec app php artisan migrate

# Opcional: Ejecutar seeders
docker compose exec app php artisan db:seed

# Ejecutar todas las pruebas
docker-compose exec app php artisan test
