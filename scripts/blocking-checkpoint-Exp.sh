# please set refinedrecovery=false




#suitename='flink.blocking'
#workloadname='friendster/concomp/'

#./single-checkpoint-run.sh $suitename $workloadname'checkpoint-6'

#./single-checkpoint-run.sh $suitename $workloadname'failure-free'



suitename='flink.blocking'
workloadname='friendster/pagerank/'

./single-checkpoint-run.sh $suitename $workloadname'checkpoint-6'

#./single-checkpoint-run.sh $suitename $workloadname'failure-free'



suitename='flink.blocking'
workloadname='webbase/pagerank/'

./single-checkpoint-run.sh $suitename $workloadname'checkpoint-6'

#./single-checkpoint-run.sh $suitename $workloadname'failure-free'



#suitename='flink.blocking'
#workloadname='webbase/concomp/'

#./single-checkpoint-run.sh $suitename $workloadname'checkpoint-6'

#./single-checkpoint-run.sh $suitename $workloadname'failure-free'

