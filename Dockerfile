FROM tomsik68/xampp:8

# Configurar directorio de trabajo
WORKDIR /opt/lampp/htdocs/kevincell

# Copiar la aplicación
COPY . .

# Configurar permisos
RUN chmod -R 755 .

# Exponer puertos
EXPOSE 80 3307

# Comando para iniciar XAMPP
CMD ["/opt/lampp/lampp", "start"]