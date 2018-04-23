# please set refinedrecovery=false




/share/hadoop/mholzemer/systems/hadoop-2.4.1/bin/hadoop fs -rm -r  hdfs://cloud-11:45010//checkpoint

rm -r /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/

/share/hadoop/chenxu/clean-exp-locallog.sh

./peel exp:run $1 $2

/share/hadoop/chenxu/kill-flink-taskmanager.sh

#sleep 120
