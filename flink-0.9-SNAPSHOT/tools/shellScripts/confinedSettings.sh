#!/bin/sh

scriptdir="$(dirname "$0")"

cd "$scriptdir"

grep "confined.recovery: false" ../../conf/flink-conf.yaml

sed -i '43s/.*/confined.recovery: true # confined recovery is enabled if it is true/' ../../conf/flink-conf.yaml

sed -i '47s/.*/replication.recovery: false # replica recovery is enabled if it is true/' ../../conf/flink-conf.yaml







