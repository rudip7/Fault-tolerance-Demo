

suitename=$1
workloadname=$2

# single node failure
for k in $( seq 7 11 )
do

id=$(($k+100))

/share/hadoop/chenxu/clean-exp-locallog.sh

/share/hadoop/mholzemer/systems/hadoop-2.4.1/bin/hadoop fs -rm -r  hdfs://cloud-11:45010//checkpoint

rm -r /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/

nohup ./peel exp:run $suitename $workloadname --run $id &

sleep 30
sh -c 'tail -n +0 --pid=$$ -F /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/log/flink-hadoop-taskmanager-cloud-12-1.log | { sed "/starting iteration \['$k'\]/ q" && kill $$ ;}'; 

#kill taskmanager on cloud-12
ssh -n cloud-12 -- "nohup /bin/bash /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/taskmanager.sh stop 1 &";
echo 'taskmanager 1 stops'

./boolean.sh

/share/hadoop/chenxu/kill-flink-taskmanager.sh 

#sleep 120

done
