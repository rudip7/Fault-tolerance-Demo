rm -Rf /tmp/hadoop-rudi/

/home/rudi/Programms/hadoop-2.6.5/bin/hadoop namenode -format

/home/rudi/Programms/hadoop-2.6.5/sbin/start-dfs.sh

/home/rudi/Programms/hadoop-2.6.5/bin/hdfs dfs -copyFromLocal /home/rudi/Fault-tolerance-Demo/outputs/11 hdfs://localhost:9000/

/home/rudi/Programms/hadoop-2.6.5/bin/hdfs dfs -mkdir hdfs://localhost:9000/checkpoint/
