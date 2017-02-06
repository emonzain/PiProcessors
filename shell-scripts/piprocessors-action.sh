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
    echo "=> Stopping all processes" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt
}

#
# start param process
#
start_process()
{
    echo "=> Starting process $1" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt
}

                                                                                                                                                              
    case "$2" in
    start)
      echo "Starting pyLoad." | tee -a /var/www/html/webcontrol-limo/actions_loging.txt
      start_process $1
    ;;
    stop)
      echo "Shutting down pyLoad." | tee -a /var/www/html/webcontrol-limo/actions_loging.txt
      stop_all
    ;;
    *)
      echo "Usage: $0 {process_target} {start|stop}" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt
      exit 1
    esac
 
    exit 0
