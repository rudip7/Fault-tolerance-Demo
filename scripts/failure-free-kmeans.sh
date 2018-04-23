

#suitename=$1
#workloadname=$2

# no cleaning when confined recovery is disable
#/share/hadoop/chenxu/clean-exp-locallog.sh

#/share/hadoop/mholzemer/systems/hadoop-2.4.1/bin/hadoop fs -rm -r  hdfs://cloud-11:45010//checkpoint

#rm -r /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/

#./peel exp:run $suitename $workloadname


#/share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/start-cluster.sh

./start.sh

sleep 120

/share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/flink run -v -c eu.stratosphere.procrustes.experiments.recovery.KMeansPureTuple /share/hadoop/mholzemer/experiments/jobs/procrustes-flink-1.0-SNAPSHOT.jar hdfs://cloud-11:45010//tmp/input/points-$3 hdfs://cloud-11:45010//tmp/input/centroid-$2 hdfs://cloud-11:45010//tmp/output $4 $1

#/share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/flink run -v -c eu.stratosphere.procrustes.experiments.recovery.KMeansHighDimension /share/hadoop/mholzemer/experiments/jobs/procrustes-flink-1.0-SNAPSHOT.jar hdfs://cloud-11:45010//tmp/input/points-$3 hdfs://cloud-11:45010//tmp/input/clusters-$2 hdfs://cloud-11:45010//tmp/output 11 $1

#/share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/flink run -v -c eu.stratosphere.procrustes.experiments.recovery.KMeansHighDimension /share/hadoop/mholzemer/experiments/jobs/procrustes-flink-1.0-SNAPSHOT.jar hdfs://cloud-11:45010//tmp/input/points hdfs://cloud-11:45010//tmp/input/clusters hdfs://cloud-11:45010//tmp/output 11 $1

#/share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/flink run -v -c eu.stratosphere.procrustes.experiments.recovery.KMeansPureTuple /share/hadoop/mholzemer/experiments/jobs/procrustes-flink-1.0-SNAPSHOT.jar hdfs://cloud-11:45010//tmp/input/points hdfs://cloud-11:45010//tmp/input/clusters hdfs://cloud-11:45010//tmp/output 11 $1

#/share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/flink run -v -c eu.stratosphere.procrustes.experiments.recovery.KMeansTuple /share/hadoop/mholzemer/experiments/jobs/procrustes-flink-1.0-SNAPSHOT.jar hdfs://cloud-11:45010//tmp/input/points hdfs://cloud-11:45010//tmp/input/clusters hdfs://cloud-11:45010//tmp/output 11 $1

/share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/bin/stop-cluster.sh


./boolean.sh

/share/hadoop/chenxu/kill-flink-taskmanager.sh


logpath="/share/hadoop/mholzemer/experiments/results/kmeans.broadcast/failurefree/checkpoint-"$1"-centroid-"$2"-points-"$3"-iteration-"$4

if [ ! -d $logpath ]; then
  mkdir -p $logpath
else
  rm $logpath/*
fi

mv /share/hadoop/mholzemer/systems/flink-0.9-SNAPSHOT/log/* $logpath/

