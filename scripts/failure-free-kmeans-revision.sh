

for j in $( seq $1 $2)
do

	./failure-free-kmeans.sh 0 d3-$3 d3-16G 100

	./failure-free-kmeans.sh 1 d3-$3 d3-16G 100

	#./failure-free-kmeans.sh 0 d3-72 d3-40G 100

	#./failure-free-kmeans.sh 1 d3-72 d3-40G 100

mv /share/hadoop/mholzemer/experiments/results/kmeans.broadcast/failurefree /share/hadoop/mholzemer/experiments/results/kmeans.broadcast/failurefree-$j

done

	#./failure-free-kmeans.sh 0 d3-72 d3-40G 100

	#./failure-free-kmeans.sh 1 d3-72 d3-40G 100

	#./failure-free-kmeans.sh 0 d3-720 d3-40G 10

	#./failure-free-kmeans.sh 1 d3-720 d3-40G 10

/share/hadoop/mholzemer/systems/hadoop-2.4.1/sbin/stop-dfs.sh
