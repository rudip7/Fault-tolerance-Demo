# please set refinedrecovery=false


suitename='flink.UNblocking'
workloadname='friendster/pagerank/'

#./single-checkpoint-run.sh $suitename $workloadname'checkpoint-6'

./single-checkpoint-run.sh $suitename $workloadname'failure-free'

#./single-checkpoint-run.sh $suitename $workloadname'checkpoint-Tail'

suitename='flink.UNblocking'
workloadname='webbase/concomp/'

#./single-checkpoint-run.sh $suitename $workloadname'checkpoint-6'

./single-checkpoint-run.sh $suitename $workloadname'failure-free'

#./single-checkpoint-run.sh $suitename $workloadname'checkpoint-Tail'

suitename='flink.UNblocking'
workloadname='webbase/pagerank/'

#./single-checkpoint-run.sh $suitename $workloadname'checkpoint-6'

./single-checkpoint-run.sh $suitename $workloadname'failure-free'

#./single-checkpoint-run.sh $suitename $workloadname'checkpoint-Tail'



suitename='flink.UNblocking'
workloadname='friendster/concomp/'

#./single-checkpoint-run.sh $suitename $workloadname'checkpoint-6'

./single-checkpoint-run.sh $suitename $workloadname'failure-free'

#./single-checkpoint-run.sh $suitename $workloadname'checkpoint-Tail'



