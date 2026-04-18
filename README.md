# Evaluación Sumativa 1
**Proyecto:** Core Bancario - Fintech Solutions S.A.  
**Asignatura:** Desarrollo Backend  
**Prof:** Patricio Eduardo Silva Cartes  
**Integrantes:** Carlos Alvarez, Neervison Laguna, Agustina Barbaroy  

---

### 1. Introducción y Arquitectura 
Como equipo hemos decidido implementar una arquitectura basada en **Microservicios Contenerizados**. Esta solución garantiza un entorno de ejecución aislado y profesional, evitando inconsistencias entre entornos de desarrollo.

Nuestro stack se compone de tres pilares fundamentales:
* **Servidor Web (Nginx):** Actúa como nuestra puerta de enlace en el puerto 80, distribuyendo el tráfico de manera eficiente.
* **Procesador de Aplicación (PHP 8.2-FPM):** Contenedor optimizado donde reside la lógica de negocio en Laravel.
* **Persistencia de Datos (MySQL 8.0):** Motor relacional dedicado exclusivamente a la gestión de la información.

### 2. Flujo de una Petición 
El recorrido de una solicitud en nuestro sistema sigue este orden:
1. La petición ingresa a través de la URL (ej. `/api/clients`).
2. Nginx intercepta la solicitud y la deriva al contenedor de PHP mediante el protocolo FastCGI.
3. El servidor de aplicación procesa la lógica, consulta al motor **MySQL** a través del ORM Eloquent (**Modelo Client**), recupera la información y la retorna en formato JSON.

**Rol del Backend:** Actúa como procesador de reglas de negocio y puente de datos seguro, garantizando que el cliente nunca interactúe directamente con la base de datos.

### 3. Estándares de Calidad 
Durante el desarrollo, priorizamos la mantenibilidad aplicando los siguientes criterios:
* **Gestión Centralizada:** Uso de archivo `.env` para credenciales, evitando el hardcoding.
* **Modularidad:** Separación de la lógica de "salud del sistema" y "clientes" para un crecimiento ordenado.
* **Eficiencia:** Uso de imágenes **Alpine Linux**, reduciendo el peso de los contenedores y acelerando el despliegue.

### 4. Guía de Despliegue 
Para poner en marcha el proyecto:
1.  **Inicialización:** `docker-compose up -d --build`
2.  **Dependencias:** `docker-compose exec app_php composer install`
3.  **Persistencia:** `docker-compose exec app_php php artisan migrate:fresh --seed`

### 5. Pruebas y Endpoints Validados
Confirmamos que los siguientes accesos están totalmente operativos:

#### A. Verificación de Salud
* **Endpoint:** `GET http://localhost/api/health`
* **Respuesta:** `{"status": "online", "version": "1.0.0", "environment": "docker"}`
```json
{
    "status": "online",
    "version": "1.0.0",
    "environment": "docker"
}
```

### B. Gestión de Clientes (Sincronizado con BD)
* **Endpoint:** `GET http://localhost/api/clients`
* **Respuesta JSON Real:**
```json
{
    "status": "success",
    "message": "Lista de clientes obtenida desde la base de datos",
    "data": [
        {
            "client_id": 1,
            "first_name": "Neervison",
            "last_name": "Laguna",
            "email": "n.laguna@ejemplo.com",
            "phone_number": "+56912345678",
            "date_of_birth": "1992-04-10"
        }
    ]
}
