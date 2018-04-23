
/home/rudi/Programms/hadoop-2.6.5/bin/hdfs dfs -rm -r hdfs://localhost:9000/checkpoint/

/home/rudi/Programms/hadoop-2.6.5/bin/hdfs dfs -mkdir hdfs://localhost:9000/checkpoint/

/home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/bin/flink run -v -c eu.stratosphere.procrustes.experiments.recovery.PageRank /home/rudi/Fault-tolerance-Demo/procrustes-flink-1.0-SNAPSHOT.jar hdfs://localhost:9000/11 hdfs://localhost:9000/outputNew11 100 10 5

echo "Your script works!" > /home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/tools/success.txt