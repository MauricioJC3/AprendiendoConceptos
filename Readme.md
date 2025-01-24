# Proyecto AprendiendoConceptos con Docker

## Requisitos Previos
- Docker
- Docker Compose

## Instalación y Uso

1. Clonar repositorio
```bash
git clone [tu-repositorio]
cd AprendiendoConceptos
```

2. Construir y levantar contenedores
```bash
docker-compose up -d --build
```

3. Acceder a los contenedores
```bash
# PHP
docker-compose exec php bash

# Composer en Laravel
docker-compose exec php composer install

# NPM/PNPM en Laravel
docker-compose exec php pnpm install
```

```pws

AprendiendoConceptos/
│
├── docker/
│   ├── php/
│   │   └── Dockerfile           # Configuración personalizada de PHP
│   ├── nginx/
│   │   └── default.conf         # Configuración de Nginx
│   └── mysql/
│       └── my.cnf               # Configuración de MySQL
│
├── docker-compose.yml            # Configuración principal de Docker
├── PHP/                          # Carpeta para proyectos PHP puros
├── laravel/                      # Carpeta para proyectos Laravel
├── .env                          # Variables de entorno
├── .gitignore                    # Archivos a ignorar en el control de versiones
└── README.md                     # Documentación del proyecto

```


## Servicios
- PHP: localhost
- MySQL: localhost:3308
- PostgreSQL: localhost:5432

## Credenciales
- MySQL:
  - Usuario: developer
  - Password: developer
  - Base de datos: laravel_db

- PostgreSQL:
  - Usuario: developer
  - Password: developer
  - Base de datos: laravel_pg