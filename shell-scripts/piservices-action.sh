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
    echo "$(date)=> Stopping all targetted services" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt
	sudo -u root  service kodi stop
}

#
# start param service
#
start_process()
{
    stop_all
    echo "$(date)=> Starting service $1" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt
	
	sudo -u root service $1 start
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
