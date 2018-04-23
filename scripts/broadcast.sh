

#./failure-free-kmeans.sh kmeans.broadcast kmeans/withoutBroadcast/

#./failure-free-kmeans.sh kmeans.broadcast kmeans/withoutBroadcast-crossHint/

#./failure-free-kmeans.sh kmeans.broadcast kmeans/Tuple-broadcast/

#./failure-free-kmeans.sh kmeans.broadcast kmeans/Tuple-broadcast-checkpoint/

#./multiplenodefailure-kmeans.sh kmeans.broadcast kmeans/Tuple-broadcast-checkpoint/
#./singlenodefailure-kmeans.sh kmeans.broadcast kmeans/Tuple-broadcast-checkpoint/
#./cascadingfailure-kmeans.sh kmeans.broadcast kmeans/Tuple-broadcast-checkpoint/



#./failure-free-kmeans.sh 0

#./failure-free-kmeans.sh 1


sed -i 's/replication.recovery\: true/replication.recovery\: false/g' /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/conf/flink-conf.yaml

#./singlenodefailure-kmeans.sh 1 7 11

#./multiplenodefailure-kmeans.sh 1 1 5

#./cascadingfailure-kmeans.sh 1 4 8


sed -i 's/replication.recovery\: false/replication.recovery\: true/g' /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/conf/flink-conf.yaml

#./singlenodefailure-kmeans.sh 0 7 11

#./multiplenodefailure-kmeans.sh 0 1 5

#./cascadingfailure-kmeans.sh 0 4 8


/share/hadoop/mholzemer/systems/hadoop-2.4.1/sbin/stop-dfs.sh





