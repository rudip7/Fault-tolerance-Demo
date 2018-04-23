
checkpointinterval=$1
x=$2
type=$3

sh -c 'tail -n +0 --pid=$$ -F /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/log/flink-hadoop-jobmanager-cloud-11.log | { sed "/(KMeans Example) changed to FINISHED/ q" && kill $$ ;}';

/share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/stop-cluster.sh

./boolean.sh

/share/hadoop/chenxu/kill-flink-taskmanager.sh 



logpath="/share/hadoop/mholzemer/experiments/results/kmeans.broadcast/"$type"/checkpoint-"$checkpointinterval"/X-"$x

if [ ! -d $logpath ]; then
  mkdir -p $logpath
else
  rm $logpath/*
fi

mv /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/log/* $logpath/


