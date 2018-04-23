#!/bin/sh

scriptdir="$(dirname "$0")"

cd "$scriptdir"
HOST=$(hostname)

sh -c 'tail -n +0 --pid=$$ -F ../../log/flink-'$USER'-taskmanager-'$HOST'-1.log | { sed "/starting iteration \['$1'\]/ q" && kill $$ ;}';
sh -c "../../bin/taskmanager.sh stop 1 &";
sh -c "../../bin/taskmanager.sh stop 2 &";

echo 'Multiple failure'

