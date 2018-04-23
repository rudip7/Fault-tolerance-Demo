#!/bin/sh

scriptdir="$(dirname "$0")"

cd "$scriptdir"

../../../Hadoop/hadoop-2.6.5/bin/hdfs dfs -rm -r hdfs://localhost:9000/checkpoint/

../../../Hadoop/hadoop-2.6.5/bin/hdfs dfs -mkdir hdfs://localhost:9000/checkpoint/

../../bin/flink run -v -c eu.stratosphere.procrustes.experiments.recovery.ConnectedComponentsBulk ../../../procrustes-flink-1.0-SNAPSHOT.jar hdfs://localhost:9000/11 hdfs://localhost:9000/outputCComp $1 $2














