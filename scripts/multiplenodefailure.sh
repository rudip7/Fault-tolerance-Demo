

suitename=$1
workloadname=$2


# multiple node failure: 1-5 nodes
for k in $( seq 1 5 )
do

id=$(($k+200))

/share/hadoop/chenxu/clean-exp-locallog.sh

/share/hadoop/mholzemer/systems/hadoop-2.4.1/bin/hadoop fs -rm -r  hdfs://cloud-11:45010//checkpoint

rm -r /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/

nohup ./peel exp:run $suitename $workloadname --run $id &

sleep 60

sh -c 'tail -n +0 --pid=$$ -F /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/log/flink-hadoop-taskmanager-cloud-12-1.log | { sed "/starting iteration \[9\]/ q" && kill $$ ;}'; 

#kill k taskmanager 
	for j in $( seq 1 $k)
	do
	nodeid=$(($j+17))
	taskid=$((($j-1)*4+17))

	#kill taskmanager on cloud-nodeid 
	ssh -n cloud-$nodeid -- "nohup /bin/bash /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/taskmanager.sh stop $taskid &";
	#echo $nodeid $taskid
	done


./boolean.sh

/share/hadoop/chenxu/kill-flink-taskmanager.sh 

#sleep 120

done




