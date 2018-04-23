#!/bin/sh

scriptdir="$(dirname "$0")"

cd "$scriptdir"

nohup /bin/bash ../../bin/start-cluster.sh >/dev/null 2>&1 &

