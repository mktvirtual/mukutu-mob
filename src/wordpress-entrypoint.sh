#!/bin/bash
# The named volume outlives the image, so a theme that only exists in
# /usr/src/wordpress never reaches /var/www/html once that volume is populated
# -- the official entrypoint copies missing files, and an already-present
# directory (even an empty one) counts as present. Refreshing it on every boot
# is what makes a redeploy actually ship the new theme.
set -e
src=/usr/src/wordpress/wp-content/themes/mukutu-base
dst=/var/www/html/wp-content/themes/mukutu-base
if [ -d "$src" ]; then
  mkdir -p "$(dirname "$dst")"
  rm -rf "$dst"
  cp -a "$src" "$dst"
  chown -R www-data:www-data "$dst"
fi
exec docker-entrypoint.sh "$@"
