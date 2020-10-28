# MÉTADONNÉES DE L'IMAGE
FROM debian:stable-slim
LABEL maintainer="Antoine GUYON"


# VARIABLES TEMPORAIRES
ARG APT_FLAGS="-q -y"
ARG DOCUMENTROOT="/var/www/html"



# --------------- DÉBUT COUCHE APACHE ---------------
RUN apt-get update -y && \
    apt-get install ${APT_FLAGS} apache2
# --------------- FIN COUCHE APACHE -----------------



# --------------- DÉBUT COUCHE PHP ------------------
RUN apt-get install ${APT_FLAGS} \
    php-mysql \
    php && \
    rm -f ${DOCUMENTROOT}/index.html && \
    apt-get autoclean -y
# --------------- FIN COUCHE PHP --------------------



# ------------- CONFIGURATION RSYSLOG ---------------
RUN apt-get install ${APT_FLAGS} rsyslog && \
    mkdir -p /var/log/net/ && touch /var/log/net/syslog.log && ln -s /var/log/net/syslog.log ${DOCUMENTROOT}
COPY conf/rsyslog.conf /etc/rsyslog.conf
# ----------- FIN CONFIGURATION RSYSLOG -------------



# --------------- CONFIGURATION PML -----------------
COPY src/ ${DOCUMENTROOT}
COPY conf/config.user.php ${DOCUMENTROOT}
COPY conf/create-user.php ${DOCUMENTROOT}
# ------------- FIN CONFIGURATION PML ---------------



# --------------- SCRIPT STARTUP -----------------
COPY run.sh /
# ------------- FIN SCRIPT STARTUP ---------------

# OUVERTURE DU PORT HTTP
EXPOSE 80 514

#CREATION VOLUME LOGs
VOLUME [ "/var/log/net/" ]

# RÉPERTOIRE DE TRAVAIL
WORKDIR  ${DOCUMENTROOT}


# EXECUTION SCRIPT ET DÉMARRAGE DES SERVICES LORS DE L'EXÉCUTION DE L'IMAGE
CMD ["/run.sh"]