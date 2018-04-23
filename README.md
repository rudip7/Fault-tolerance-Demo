# Fault-tolerance-Demo

## Systems

* **Flink**: ```/flink-0.9-SNAPSHOT``` includes a modified flink system which has implemented the algorithms mentioned in the papers
* [**Hadoop**](/Hadoop/Hadoop.md): we suggest to deploy ```hadoop-2.4.1``` HDFS to save the checkpoints and set a small block size so that the data would be partitioned locally
* [**Spark**](/Spark/Spark.md): we suggest to employ ```spark-1.3.1-bin-hadoop2.6``` to generate input dataset for K-means 
* **Procrustes**: ```procrustes-flink-1.0-SNAPSHOT.jar``` includes the pagerank, connected compoents and k-means implementations on Flink

## Scripts

Shell scripts to drive the experiments (please ignore peel-xml)

## Flink configuration

*taskmanager.tmp.dirs*: the process id for jobmanager or taskmanager might be saved here

*taskmanager.checkpoint.dir*: hdfs to save checkpoint

To enable confined recovery, please set 
```
confined.recovery: true
replication.recovery: false
```

To enable replica recovery, please set
```
confined.recovery: false
replication.recovery: true
```

## Input Datasets

For PageRank and Connected components, we use [WebGraph](http://law.di.unimi.it/datasets.php) as input dataset

```bash
 java -cp "*" it.unimi.dsi.webgraph.ArcListASCIIGraph -g BVGraph $input path$ $output path$
 ```
For K-Means, we use spark and procrustes to generate the dataset

```bash
./spark-submit --class eu.stratosphere.procrustes.datagen.spark.SparkClusterGenerator ../procrustes-datagen-1.0-SNAPSHOT.jar spark://localhost:port $#parallelism$ $#items$ file://clusters-D3-K3.csv hdfs://.../input/clusters
 ```

## Job Submission

### PageRank

* **Head checkpoint**
```bash
/…/flink-0.9-SNAPSHOT/bin/flink run -v -c eu.stratosphere.procrustes.experiments.recovery.PageRank ${app.path.jobs}/procrustes-flink-1.0-SNAPSHOT.jar ${system.hadoop-2.path.input}/input ${system.hadoop-2.path.output}/output ${# of pages} ${# of iteration} ${# of checkpoint interval}
```

Tips: checkpoint would be saved if ```${# of checkpoint interval}>0``` and there is no checkpoint if ```${# of checkpoint interval}=0```

* **Tail checkpoint**
```bash
/…/flink-0.9-SNAPSHOT/bin/flink run -v -c eu.stratosphere.procrustes.experiments.recovery.PageRankLateCpt ${app.path.jobs}/procrustes-flink-1.0-SNAPSHOT.jar ${system.hadoop-2.path.input}/input ${system.hadoop-2.path.output}/output ${# of pages} ${# of iteration} ${# of checkpoint interval}
```

### Connected components

* **Head checkpoint**
```bash
/…/flink-0.9-SNAPSHOT/bin/flink run -v -c eu.stratosphere.procrustes.experiments.recovery.ConnectedComponentsBulk ${app.path.jobs}/procrustes-flink-1.0-SNAPSHOT.jar ${system.hadoop-2.path.input}/webbase-raw ${system.hadoop-2.path.output}/concomp ${# of iteration} ${# of checkpoint interval}
```

* **Tail checkpoint**
```bash
/…/flink-0.9-SNAPSHOT/bin/flink run -v -c eu.stratosphere.procrustes.experiments.recovery.ConnectedComponentsBulkLateCpt ${app.path.jobs}/procrustes-flink-1.0-SNAPSHOT.jar ${system.hadoop-2.path.input}/webbase-raw ${system.hadoop-2.path.output}/concomp ${# of iteration} ${# of checkpoint interval}
```

### K-Means
```bash
/…/flink-0.9-SNAPSHOT/bin/flink run -v -c eu.stratosphere.procrustes.experiments.recovery.KMeansPureTuple /…/procrustes-flink-1.0-SNAPSHOT.jar hdfs://… /input/points hdfs://…/input/centroid hdfs://…/output ${# of iteration} ${# of checkpoint interval}
```
# Fault-tolerance-Demo
