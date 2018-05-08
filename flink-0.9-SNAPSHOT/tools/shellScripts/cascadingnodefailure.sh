#!/bin/sh

scriptdir="$(dirname "$0")"

cd "$scriptdir"

HOST=$(hostname)

sh -c 'tail -n +0 --pid=$$ -F ../../log/flink-'$USER'-taskmanager-'$HOST'-1.log | { sed "/starting iteration \['$1'\]/ q" && kill $$ ;}';
sh -c "../../bin/taskmanager.sh stop 1 &";

sh -c "truncate -s 0 ../../log/flink-'$USER'-taskmanager-'$HOST'-2.log"
sh -c 'tail -n +0 --pid=$$ -F ../../log/flink-'$USER'-taskmanager-'$HOST'-2.log | { sed "/starting iteration \['$2'\]/ q" && kill $$ ;}';
sh -c "../../bin/taskmanager.sh stop 2 &";

echo 'Cascading failure'

