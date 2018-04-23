

suitename=$1
workloadname=$2
k=3


sh -c 'tail -n +0 --pid=$$ -F /home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/log/flink-rudi-taskmanager-rudi-7-3.log | { sed "/starting iteration \['$k'\]/ q" && kill $$ ;}';
PID=`jps | grep "TaskManager" | head -1 | cut -d " " -f 1`;
echo 'kill '$PID'';
sh -c 'kill '$PID'';
#sh -c 'kill `jps | grep "TaskManager" | cut -d " " -f 1`';

echo 'taskmanager 3 stops'

