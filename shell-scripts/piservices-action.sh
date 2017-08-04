#!/bin/sh
### BEGIN INIT INFO
# Provides: pyload
# Required-Start: $all
# Required-Stop:
# Default-Start: 2 3 4 5
# Default-Stop: 0 1 6
# Short-Description: start pyLoad
# Description: start pyLoad
 ### END INIT INFO                                                                                                                                            


#
# stop_all
#
stop_all()
{
    echo "$(date)=> STOP - Start stopping all targetted services" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt

	sudo service kodi stop | tee -a /var/www/html/webcontrol-limo/actions_loging.txt

    echo "$(date)=> STOP - End stopping all targetted services" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt
}

#
# start param service
#
start_process()
{
    stop_all

    echo "$(date)=> START - Start starting service $1" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt

    sudo service $1 start | tee -a /var/www/html/webcontrol-limo/actions_loging.txt

    echo "$(date)=> START - End starting service $1" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt
}

                                                                                                                                                              
    case "$2" in
    start)
      start_process $1
    ;;
    
    stop)
      stop_all
    ;;
    
    *)
      echo "Usage: $0 {service} {start|stop}" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt
      exit 1
    esac
 
    exit 0
