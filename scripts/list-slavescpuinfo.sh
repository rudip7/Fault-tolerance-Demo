awk '{print $1}' /share/hadoop/chenxu/slaves | while read line

do

    echo "===================="

    echo $line

	ssh -n $line cat /proc/cpuinfo | grep name | cut -f2 -d: | uniq -c
	#ssh -n $line cat /proc/cpuinfo | grep physical | uniq -c
done
