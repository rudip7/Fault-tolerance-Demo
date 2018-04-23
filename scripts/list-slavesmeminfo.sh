awk '{print $1}' /share/hadoop/chenxu/slaves | while read line

do

    echo "===================="

    echo $line

	ssh -n $line cat /proc/meminfo | grep MemTotal
done
