#!/bin/sh

scriptdir="$(dirname "$0")"

cd "$scriptdir"

nohup /bin/bash multiplenodefailure.sh 4 >/dev/null 2>&1 & nohup /bin/bash kMeans.sh 6 >/dev/null 2>&1 &

