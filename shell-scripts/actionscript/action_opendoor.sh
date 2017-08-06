#!/bin/sh

gpio mode 7 out


gpio write 7 0


sleep 5


gpio write 7 1
