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
    echo "Stopping all processes";
    
}

#
# start param process
#
start_process()
{
    echo "Starting process $1"    
}

                                                                                                                                                              
    case "$2" in
    start)
      echo "Starting pyLoad."
      start_process $1
    ;;
    stop)
      echo "Shutting down pyLoad."
      stop_all
    ;;
    *)
      echo "Usage: $0 {process_target} {start|stop}"
      exit 1
    esac
 
    exit 0
