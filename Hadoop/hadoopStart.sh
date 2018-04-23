hadoop-2.6.5/bin/hadoop namenode -format

hadoop-2.6.5/sbin/start-dfs.sh

hadoop-2.6.5/bin/hdfs dfs -copyFromLocal /home/rudi/Fault-tolerance-Demo/inputs/11 hdfs://localhost:9000/

hadoop-2.6.5/bin/hdfs dfs -copyFromLocal /home/rudi/Fault-tolerance-Demo/inputs/clusters hdfs://localhost:9000/

hadoop-2.6.5/bin/hdfs dfs -mkdir hdfs://localhost:9000/checkpoint/
