#!/bin/sh

scriptdir="$(dirname "$0")"

cd "$scriptdir"

HOST=$(hostname)

sh -c 'tail -n +0 --pid=$$ -F ../../log/flink-'$USER'-taskmanager-'$HOST'-1.log | { sed "/starting iteration \['$1'\]/ q" && kill $$ ;}';
sh -c "../../bin/taskmanager.sh stop 1 &";
#sh -c 'kill `jps | grep "TaskManager" | cut -d " " -f 1`';

echo 'Single failure'

