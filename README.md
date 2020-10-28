# Rsyslog-GUI
![](https://www.syloe.com/wp-content/uploads/sites/12/2020/01/rsyslog-logo-768x261.png)

Docker image of Rsyslog with Pimpmylog GUI based on debian:stable-slim (latest)

Software used:
[RSYSLOG](https://www.rsyslog.com)
[PIMPMYLOG](https://www.pimpmylog.com)
[DEBIAN](https://www.debian.org)

## Links

[Doker hub image](https://hub.docker.com/r/aguyonnet/rsyslog-gui)

## Files

 - Dockerfile
 -  conf (folder that includes PMA and RSYSLOG confs files)
 - src (folder that contain PMA files)
## Ports

By default, the image listens on the following ports:

 - 80 (PMA GUI)
 - 514 (UDP Rsyslog)

## Environment variable 

 - SYSLOG_USERNAME
 - SYSLOG_PASSWORD

If you do not specify these environment variables, the default login will be **admin** and the password will be **changeme1234**
##  Quick launch
Without specifying login and password

    docker run -d -p 80:80 -p 514:514/udp aguyonnet/rsyslog-gui
By specifying a login and password

    docker run -d -e SYSLOG_USERNAME=hello -e SYSLOG_PASSWORD=mypassword -p 80:80 -p 514:514/udp aguyonnet/rsyslog-gui

## Docker-compose it !

    version: '3.3'
    services:
      rsyslog-gui:
        environment:
          - SYSLOG_USERNAME=hello
          - SYSLOG_PASSWORD=mypassword
        ports:
          - '80:80'
          - '514:514/udp'
        image: aguyonnet/rsyslog-gui
        restart: always
