

#suitename=$1
#workloadname=$2

# single node failure
for k in $( seq $2 $3 )
do

#id=$(($k+100))

#/share/hadoop/chenxu/clean-exp-locallog.sh

#/share/hadoop/mholzemer/systems/hadoop-2.4.1/bin/hadoop fs -rm -r  hdfs://cloud-11:45010//checkpoint

#rm -r /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/

#nohup ./peel exp:run $suitename $workloadname --run $id &

#/share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/start-cluster.sh

./start.sh

sleep 120

nohup /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/flink run -v -c eu.stratosphere.procrustes.experiments.recovery.KMeansPureTuple /share/hadoop/mholzemer/experiments/jobs/procrustes-flink-1.0-SNAPSHOT.jar hdfs://cloud-11:45010//tmp/input/points-$5 hdfs://cloud-11:45010//tmp/input/centroid-$4 hdfs://cloud-11:45010//tmp/output 11 $1 &

#nohup /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/flink run -v -c eu.stratosphere.procrustes.experiments.recovery.KMeansPureTuple /share/hadoop/mholzemer/experiments/jobs/procrustes-flink-1.0-SNAPSHOT.jar hdfs://cloud-11:45010//tmp/input/points hdfs://cloud-11:45010//tmp/input/clusters hdfs://cloud-11:45010//tmp/output 11 $1 &

sleep 10
#sh -c 'tail -n +0 --pid=$$ -F /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/log/flink-hadoop-taskmanager-cloud-12-1.log | { sed "/starting iteration \['$k'\]/ q" && kill $$ ;}'; 
sh -c 'tail -n +0 --pid=$$ -F /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/log/flink-hadoop-taskmanager-cloud-15-11.log | { sed "/starting iteration \['$k'\]/ q" && kill $$ ;}';

#kill taskmanager on cloud-12
#ssh -n cloud-12 -- "nohup /bin/bash /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/taskmanager.sh kill 1 &";
#echo 'taskmanager 1 stops'

#kill taskmanager on cloud-15
ssh -n cloud-15 -- "nohup /bin/bash /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/taskmanager.sh kill 11 &";
echo 'taskmanager 15 stops'

sleep 30

./stop.sh $1 $k singlefailure




#sh -c 'tail -n +0 --pid=$$ -F /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/log/flink-hadoop-jobmanager-cloud-11.log | { sed "/(KMeans Example) changed to FINISHED/ q" && kill $$ ;}';

#/share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/stop-cluster.sh

#./boolean.sh

#/share/hadoop/chenxu/kill-flink-taskmanager.sh 



#logpath="/share/hadoop/mholzemer/experiments/results/kmeans.broadcast/singlenodefailure/checkpoint-"$1"/superstep-"$k

#if [ ! -d $logpath ]; then
 # mkdir -p $logpath
#else
 # rm $logpath/*
#fi

#mv /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/log/* $logpath/

#sleep 120

done
