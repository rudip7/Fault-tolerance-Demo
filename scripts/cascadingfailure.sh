

suitename=$1
workloadname=$2


# cascading node failure at superstep 6 - 10
for k in $( seq 6 10 )
do

id=$(($k+300))

/share/hadoop/chenxu/clean-exp-locallog.sh

/share/hadoop/mholzemer/systems/hadoop-2.4.1/bin/hadoop fs -rm -r  hdfs://cloud-11:45010//checkpoint

rm -r /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/

nohup ./peel exp:run $suitename $workloadname --run $id &

sleep 60

#kill taskmanager on cloud-12 at superstep 11
sh -c 'tail -n +0 --pid=$$ -F /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/log/flink-hadoop-taskmanager-cloud-12-1.log | { sed "/starting iteration \[11\]/ q" && kill $$ ;}'; 
ssh -n cloud-12 -- "nohup /bin/bash /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/taskmanager.sh stop 1 &";

sleep 30; 

#kill taskmanager on cloud-13 at superstep k
truncate -s 0 /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/log/flink-hadoop-taskmanager-cloud-13-5.log;  
sh -c 'tail -n +0 --pid=$$ -F /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/log/flink-hadoop-taskmanager-cloud-13-5.log | { sed "/starting iteration \['$k'\]/ q" && kill $$ ;}';
ssh -n cloud-13 -- "nohup /bin/bash /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/taskmanager.sh stop 5 &";

./boolean.sh

/share/hadoop/chenxu/kill-flink-taskmanager.sh 

#sleep 120

done



