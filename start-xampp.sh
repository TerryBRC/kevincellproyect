#!/bin/bash
chmod -R 755 /opt/lampp/htdocs
chown -R daemon:daemon /opt/lampp/htdocs
/opt/lampp/lampp startapache
/opt/lampp/lampp startmysql
tail -f /opt/lampp/logs/error_log