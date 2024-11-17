# Pixels Eats
Symfony 7.2 aplicación para restaurantes con un pequeño backoffice.

### PixelEats es una plataforma de menú digital y backoffice para restaurantes y cafeterías, creada como una iniciativa de código abierto por Pixels Studio.
### Con PixelEats, los administradores pueden gestionar sus productos, personalizar su logotipo y presentar sus ofertas con elegancia.

> "Es una solución gratuita y libre de regalias para cualquier usuario que busca herramientas modernas y sencillas".

## :hammer:Funcionalidades del proyecto
- `Comercio`: Crear y Administrar Comercios.
- `Sucursal`: Crear Sucursales de Comercios, detalles como la hora, ubicación, nombre, logo, urls y un banner que luego serán mostrados en el menu.
- `Categorias`: Crear Categorias para los productos.
- `Productos`: Crear Productos y asignarlos a una Categoría.
- `Usuarios`: Crear Usuarios para administrar el sistema.
- `Comandos`: Se agrego un comando para poder generar el primer usuario.
> php bin/console app:create-user admin@pixelseats.com pixelsAdmin userAdmin123 ROLE_ADMIN.

- `Roles`: Se agrego roles de usuarios, ROLE_USER, ROLE_ADMIN, ROLE_SUPER_ADMIN.
- `Templates`: Se agrego templates en la sucursal que pueden ser utilizadas para definir un estilo en particular, bares, restaurantes, cafeterías.
- `Slugs`: Se agrego slugs tanto en el comercio como en la sucursal, esto permite tener varias vistas de sucursales y comercios.

## Recursos

<img src="https://github.com/user-attachments/assets/ad9be7e3-aed7-4745-8683-3cbb757cbe35" width=500> <br><br>
<img src="https://github.com/user-attachments/assets/07b3ff93-2118-4bfc-b0a0-ca24334b9080" width=120> <br>
[@maxshtefec](https://www.linkedin.com/in/maxshtefec/) :+1: Es el creador y donador de este fabuloso repositorio!
