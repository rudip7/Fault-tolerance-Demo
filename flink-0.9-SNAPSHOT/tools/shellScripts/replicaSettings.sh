#!/bin/sh

scriptdir="$(dirname "$0")"

cd "$scriptdir"

grep "replication.recovery: false" ../../conf/flink-conf.yaml

sed -i '43s/.*/confined.recovery: false # confined recovery is enabled if it is true/' ../../conf/flink-conf.yaml

sed -i '47s/.*/replication.recovery: true # replica recovery is enabled if it is true/' ../../conf/flink-conf.yaml