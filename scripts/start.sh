


# single node failure

#id=$(($k+100))

/share/hadoop/chenxu/clean-exp-locallog.sh

/share/hadoop/mholzemer/systems/hadoop-2.4.1/bin/hadoop fs -rm -r  hdfs://cloud-11:45010//checkpoint

rm /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/log/*

#nohup ./peel exp:run $suitename $workloadname --run $id &

/share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/start-cluster.sh
