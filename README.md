# KevinCell - Sistema de Gestión de Tienda Celular

![KevinCell Logo](assets/img/logo.png)

## 📱 Descripción
Sistema web para la gestión de una tienda de celulares y accesorios. Permite el control de inventario, clientes, y sistema de créditos con seguimiento de abonos.

## 🚀 Características
- Gestión de Clientes
  - Registro de información personal
  - Historial de compras y créditos
  - Seguimiento de pagos

- Control de Inventario
  - Registro de productos
  - Control de stock
  - Precios de compra y venta
  - Descripción detallada de productos

- Sistema de Créditos
  - Creación de créditos
  - Registro de abonos
  - Seguimiento de saldos
  - Historial de pagos

## 🛠️ Tecnologías Utilizadas
- PHP 7.4+
- MySQL/MariaDB
- Bootstrap 5
- HTML5
- CSS3
- JavaScript

## ⚙️ Requisitos del Sistema
- XAMPP v3.3.0 o superior
- PHP 7.4 o superior
- MySQL 5.7 o superior
- Navegador web moderno (Chrome, Firefox, Edge)

## 📦 Instalación
1. Clonar el repositorio en la carpeta htdocs de XAMPP:
```bash
git clone https://github.com/TerryBRC/kevincellproyect.git

2. Importar la base de datos:
   
   - Abrir phpMyAdmin
   - Crear una nueva base de datos llamada 'kevincell'
   - Importar el archivo SQL ubicado en database/kevincell.sql
3. Configurar la conexión:
   
   - Editar el archivo config/Database.php
   - Actualizar las credenciales de ser necesario
## 🔧 Configuración
// config/Database.php
private $host = "localhost";
private $db_name = "kevincell_db";
private $username = "elquequieran";
private $password = "";

## 📝 Uso
1. Acceder al sistema mediante:
http://localhost/kevincell

2. Funcionalidades principales:
   - Gestión de Clientes
   - Control de Inventario
   - Administración de Créditos
   - Registro de Abonos

## 👥 Contribución
1. Fork el proyecto
2. Crea tu Feature Branch ( git checkout -b feature/AmazingFeature )
3. Commit tus cambios ( git commit -m 'Add some AmazingFeature' )
4. Push al Branch ( git push origin feature/AmazingFeature )
5. Abre un Pull Request

## 📄 Licencia
Este proyecto está bajo la Licencia MIT - ver el archivo LICENSE.md para más detalles.

## ✨ Autor
- Kevin [Tu Apellido]
- Contacto: [Tu correo]
## 🙏 Agradecimientos
- Bootstrap por el framework CSS
- XAMPP por el entorno de desarrollo
- Todos los contribuidores que han participado en este proyecto
## 📸 Capturas de Pantalla

![image](https://github.com/user-attachments/assets/a0a75e07-3a68-4ece-80a0-3cc8f03ebbf7)
![image](https://github.com/user-attachments/assets/8444d715-8576-41ea-9268-12769beef8ba)

Este README proporciona:
- Descripción clara del proyecto
- Características principales
- Requisitos técnicos
- Instrucciones de instalación
- Guía de configuración
- Información de uso
- Sección de contribución
- Información de licencia y contacto
