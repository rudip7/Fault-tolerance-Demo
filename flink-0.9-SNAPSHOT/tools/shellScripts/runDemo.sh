#!/bin/sh

scriptdir="$(dirname "$0")"

cd "$scriptdir"

nohup /bin/bash pageRank.sh 10 6 >/dev/null 2>&1 &

