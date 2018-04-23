awk '{print $1}' /share/hadoop/chenxu/slaves | while read line

do

    echo "===================="

    echo $line

	ssh -n $line mkdir -p /data/peel/hadoop-2.4.1
        ssh -n $line mkdir -p /data/1/peel/hadoop-2.4.1/data
       # ssh -n $line mkdir -r /data/1/peel/hadoop-2.4.1/check
done
