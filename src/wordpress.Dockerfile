# The theme has to travel inside the image: Coolify keeps only the generated
# compose file next to a docker-compose application, so a bind mount of
# ./theme/mukutu-base resolves to an empty directory on the server.
#
# /usr/src/wordpress is where the official entrypoint copies core from into
# /var/www/html on boot, so a theme dropped here reaches the named volume too.
FROM wordpress:latest
COPY src/theme/mukutu-base /usr/src/wordpress/wp-content/themes/mukutu-base
