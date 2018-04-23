awk '{print $1}' /share/hadoop/chenxu/slaves | while read line

do

    echo "===================="

    echo $line

    echo "===================="

	#ssh -n $line rm -r /data/1/peel/hadoop-2/*
        ssh -n $line rm -r /data/1/peel/hadoop-2/data
	#ssh -n $line rm -r /data/2/peel/hadoop-2/data
	#ssh -n $line rm -r /data/3/peel/hadoop-2/data
	#ssh -n $line rm -r /data/4/peel/hadoop-2/data	
done
