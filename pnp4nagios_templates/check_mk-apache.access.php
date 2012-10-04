<?php
# +------------------------------------------------------------------+
# |             ____ _               _        __  __ _  __           |
# |            / ___| |__   ___  ___| | __   |  \/  | |/ /           |
# |           | |   | '_ \ / _ \/ __| |/ /   | |\/| | ' /            |
# |           | |___| | | |  __/ (__|   <    | |  | | . \            |
# |            \____|_| |_|\___|\___|_|\_\___|_|  |_|_|\_\           |
# |                                                                  |
# | Copyright Mathias Kettner 2012             mk@mathias-kettner.de |
# +------------------------------------------------------------------+
#
# This file is part of Check_MK.
# The official homepage is at http://mathias-kettner.de/check_mk.
#
# check_mk is free software;  you can redistribute it and/or modify it
# under the  terms of the  GNU General Public License  as published by
# the Free Software Foundation in version 2.  check_mk is  distributed
# in the hope that it will be useful, but WITHOUT ANY WARRANTY;  with-
# out even the implied warranty of  MERCHANTABILITY  or  FITNESS FOR A
# PARTICULAR PURPOSE. See the  GNU General Public License for more de-
# ails.  You should have  received  a copy of the  GNU  General Public
# License along with GNU Make; see the file  COPYING.  If  not,  write
# to the Free Software Foundation, Inc., 51 Franklin St,  Fifth Floor,
# Boston, MA 02110-1301 USA.

# (length=22;10;20;; size=2048;;;;)

$idx = 1;
$opt[$idx] = "--vertical-label Accesses/s -l0  --title \"Apache Accesses on $hostname\" ";
$def[$idx] =  "DEF:first=$RRDFILE[1]:$DS[1]:MAX " ;
#$def[$idx] .= "HRULE:$WARN[1]#FFFF00 ";
#$def[$idx] .= "HRULE:$CRIT[1]#FF0000 ";
$def[$idx] .= "AREA:first#6890a0:\"Accesses\" " ;
$def[$idx] .= "LINE:first#2060a0 " ;
$def[$idx] .= "GPRINT:first:LAST:\"%6.2lf last\" " ;
$def[$idx] .= "GPRINT:first:AVERAGE:\"%6.2lf avg\" " ;
$def[$idx] .= "GPRINT:first:MAX:\"%6.2lf max\\n\" ";

# -b1024 : base unit, use to scale memory. For traffic measurement, 1 kb/s is 1000 b/s.
# -X6    : sets the 10**exponent scaling of the y-axis values
# -l0    : lower-limit value
#$opt[$idx] = "--vertical-label MBytes/s -b1024 -X6 -l0 --title \"Apache Traffic\" ";

$idx++;
$opt[$idx] = "--vertical-label Bytes/s -l0 --title \"Apache Traffic on $hostname\" ";
$def[$idx] = "DEF:second=$RRDFILE[2]:$DS[2]:MAX " ;
#$def[$idx] .= "HRULE:$WARN[1]#FFFF00 ";
#$def[$idx] .= "HRULE:$CRIT[1]#FF0000 ";
$def[$idx] .= "AREA:second#65ab0e:\"Traffic\" " ;
$def[$idx] .= "LINE:second#206a0e " ;
$def[$idx] .= "GPRINT:second:LAST:\"%6.2lf%s last\" " ;
$def[$idx] .= "GPRINT:second:AVERAGE:\"%6.2lf%s avg\" " ;
$def[$idx] .= "GPRINT:second:MAX:\"%6.2lf%s max\\n\" ";


?>
