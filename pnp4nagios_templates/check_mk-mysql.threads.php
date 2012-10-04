<?php

# check_mk-mysql.threads.php
#
# PNP4Nagios Template for MySQL Threads
#
# 2012-09-29 FLX f@qsol.ro
# 	- Adapted from check_mk-apache.requests.php
#
#


# (length=22;10;20;; size=2048;;;;)
$idx = 1;

$opt[$idx] = "--vertical-label Threads -l0  --title \"MySQL Threads on $hostname\" ";
# threads_running, threads_connected, threads_cached, threads_created

$def[$idx]  = "DEF:run=$RRDFILE[1]:$DS[1]:MAX " ;
$def[$idx] .= "DEF:conn=$RRDFILE[2]:$DS[2]:MAX " ;
$def[$idx] .= "DEF:cache=$RRDFILE[3]:$DS[3]:MAX " ;
$def[$idx] .= "CDEF:btotal=run,conn,cache,+,+ ";
$def[$idx] .= "CDEF:total=run,conn,+ ";

$def[$idx] .= "AREA:conn#ff6000:\"Connected\" " ;
$def[$idx] .= "GPRINT:conn:LAST:\"%2.0lf\" " ;

$def[$idx] .= "AREA:run#60f020:\"Running\":STACK " ;
$def[$idx] .= "GPRINT:run:LAST:\"%2.0lf\" " ;

$def[$idx] .= "LINE:total#004080:\"Total\" " ;
$def[$idx] .= "GPRINT:total:LAST:\"%2.0lf\" " ;

$idx++;
$opt[$idx] = "--vertical-label Threads -l0 --title \"MySQL Cached Threads on $hostname\" ";

$def[$idx]  = "DEF:run=$RRDFILE[1]:$DS[1]:MAX " ;
$def[$idx] .= "DEF:conn=$RRDFILE[2]:$DS[2]:MAX " ;
$def[$idx] .= "DEF:cache=$RRDFILE[3]:$DS[3]:MAX " ;
$def[$idx] .= "CDEF:btotal=run,conn,cache,+,+ ";
$def[$idx] .= "CDEF:total=run,conn,+ ";

$def[$idx] .= "AREA:cache#1f78b4:\"Cached\" " ;
$def[$idx] .= "GPRINT:cache:LAST:\"%2.0lf\" " ;

$def[$idx] .= "LINE:btotal#004080:\"Total\" " ;
$def[$idx] .= "GPRINT:btotal:LAST:\"%2.0lf\" " ;


# -b1024 : base unit, use to scale memory. For traffic measurement, 1 kb/s is 1000 b/s.
# -X6    : sets the 10**exponent scaling of the y-axis values
# -l0    : lower-limit value
#$opt[$idx] = "--vertical-label MBytes/s -b1024 -X6 -l0 --title \"Apache Traffic\" ";

$idx++;
$opt[$idx] = "--vertical-label Threads -l0 --title \"MySQL Created Threads on $hostname\" ";

$def[$idx]  = "DEF:created=$RRDFILE[4]:$DS[4]:MAX " ;

#$def[$idx] .= "HRULE:$WARN[1]#FFFF00 ";
#$def[$idx] .= "HRULE:$CRIT[1]#FF0000 ";
$def[$idx] .= "AREA:created#65ab0e:\"Created\" " ;
$def[$idx] .= "LINE:created#206a0e " ;
$def[$idx] .= "GPRINT:created:LAST:\"%6.2lf%s last\" " ;
$def[$idx] .= "GPRINT:created:AVERAGE:\"%6.2lf%s avg\" " ;
$def[$idx] .= "GPRINT:created:MAX:\"%6.2lf%s max\\n\" ";


?>
