

suitename=$1
workloadname=$2
k=7


sh -c 'tail -n +0 --pid=$$ -F /home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/log/flink-rudi-jobmanager-rudi-7-11.log | { sed "/finishing iteration \['$k'\]/ q" && kill $$ ;}';
sh -c "/home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/bin/taskmanager.sh stop 2";
#sh -c 'kill `jps | grep "TaskManager" | cut -d " " -f 1`';

echo 'Single failure'

