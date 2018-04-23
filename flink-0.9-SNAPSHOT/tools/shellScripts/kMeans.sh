#!/bin/sh

scriptdir="$(dirname "$0")"

cd "$scriptdir"

../../bin/flink run -v -c eu.stratosphere.procrustes.experiments.recovery.KMeansPureTuple ../../../procrustes-flink-1.0-SNAPSHOT.jar hdfs://localhost:9000/clusters/part-00000 hdfs://localhost:9000/clusters/centroids hdfs://localhost:9000/outputKMeans $1 0

 
