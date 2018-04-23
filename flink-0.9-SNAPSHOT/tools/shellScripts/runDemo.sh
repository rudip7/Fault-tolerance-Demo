#!/bin/sh

scriptdir="$(dirname "$0")"

cd "$scriptdir"

nohup /bin/bash cascadingnodefailure.sh 8 7 4 >/dev/null 2>&1 & nohup /bin/bash connectedComponents.sh 10 4 >/dev/null 2>&1 &

