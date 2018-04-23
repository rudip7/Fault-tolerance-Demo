

suitename=$1
workloadname=$2

/share/hadoop/chenxu/clean-exp-locallog.sh

/share/hadoop/mholzemer/systems/hadoop-2.4.1/bin/hadoop fs -rm -r  hdfs://cloud-11:45010//checkpoint

rm -r /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/

./peel exp:run $suitename $workloadname

./boolean.sh

/share/hadoop/chenxu/kill-flink-taskmanager.sh 

