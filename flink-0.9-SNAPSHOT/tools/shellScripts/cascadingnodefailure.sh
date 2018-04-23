#!/bin/sh

scriptdir="$(dirname "$0")"

cd "$scriptdir"

HOST=$(hostname)

#ERR=$1
#ERR2=$2
#CHECK=$3
#LAST=$((ERR/CHECK))
#echo $LAST
#if [ $((ERR%CHECK)) = "0" ]; then
#            LAST=$((LAST-1))
#fi
#LAST=$((LAST*CHECK))
#echo $LAST

#ERR2=$((ERR+(ERR2-LAST)-1))
#echo $ERR2

sh -c 'tail -n +0 --pid=$$ -F ../../log/flink-'$USER'-taskmanager-'$HOST'-1.log | { sed "/starting iteration \['$1'\]/ q" && kill $$ ;}';
sh -c "../../bin/taskmanager.sh stop 1 &";

#ERR=$1
#ERRS=$((ERR+2))
#echo $ERRS
#sleep 10
#sh -c 'tail -n +0 --pid=$$ -F ../../log/flink-rudi-taskmanager-rudi-7-2.log | { sed "/starting iteration \['$ERRS'\]/ q" && kill $$ ;}';
sh -c "truncate -s 0 ../../log/flink-'$USER'-taskmanager-'$HOST'-2.log"
sh -c 'tail -n +0 --pid=$$ -F ../../log/flink-'$USER'-taskmanager-'$HOST'-2.log | { sed "/starting iteration \['$2'\]/ q" && kill $$ ;}';
sh -c "../../bin/taskmanager.sh stop 2 &";

echo 'Cascading failure'

