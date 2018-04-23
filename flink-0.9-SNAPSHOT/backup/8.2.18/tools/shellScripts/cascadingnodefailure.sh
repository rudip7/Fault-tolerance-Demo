

suitename=$1
workloadname=$2
k=6
j=8


sh -c 'tail -n +0 --pid=$$ -F /home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/log/flink-rudi-taskmanager-rudi-7-1.log | { sed "/starting iteration \['$k'\]/ q" && kill $$ ;}';
sh -c "/home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/bin/taskmanager.sh stop 1 &";



sh -c 'tail -n +0 --pid=$$ -F /home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/log/flink-rudi-taskmanager-rudi-7-2.log | { sed "/starting iteration \['$j'\]/ q" && kill $$ ;}';
sh -c "/home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/bin/taskmanager.sh stop 2 &";

echo 'Cascading failure'

