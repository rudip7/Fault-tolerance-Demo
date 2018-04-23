awk '{print $1}' /share/hadoop/chenxu/slaves | while read line

do

    echo "===================="

    echo $line

    echo "===================="

#(ssh -n $line "find /tmp/ -name 'flinklog*' -type d -exec rm -r {} +" < /dev/null &)
#       (ssh -n $line "rm -r /tmp/flinklog*" &)
       ssh -n $line kill -KILL $(ssh -n $line ps aux | grep '[o]rg.apache.flink.runtime.taskmanager.TaskManager ' -m1 | awk '{print $2}');
sleep 1;ssh -n $line kill $(ssh -n $line ps aux | grep '[o]rg.apache.flink.runtime.taskmanager.TaskManager ' -m1 | awk '{print $2}');
sleep 1;ssh -n $line kill $(ssh -n $line ps aux | grep '[o]rg.apache.flink.runtime.taskmanager.TaskManager ' -m1 | awk '{print $2}');
sleep 1; ssh -n $line kill $(ssh -n $line ps aux | grep '[o]rg.apache.flink.runtime.taskmanager.TaskManager ' -m1 | awk '{print $2}');
sleep 1; ssh -n $line kill $(ssh -n $line ps aux | grep '[o]rg.apache.flink.runtime.taskmanager.TaskManager ' -m1 | awk '{print $2}');
#sleep 1; ssh -n $line kill $(ssh -n $line ps aux | grep '[o]rg.apache.flink.runtime.taskmanager.TaskManager ' -m1 | awk '{print $2}');
#sleep 1; ssh -n $line kill $(ssh -n $line ps aux | grep '[o]rg.apache.flink.runtime.taskmanager.TaskManager ' -m1 | awk '{print $2}');
#sleep 1; ssh -n $line kill $(ssh -n $line ps aux | grep '[o]rg.apache.flink.runtime.taskmanager.TaskManager ' -m1 | awk '{print $2}');
#sleep 1; ssh -n $line kill $(ssh -n $line ps aux | grep '[o]rg.apache.flink.runtime.taskmanager.TaskManager ' -m1 | awk '{print $2}');
#sleep 1; ssh -n $line kill $(ssh -n $line ps aux | grep '[o]rg.apache.flink.runtime.taskmanager.TaskManager ' -m1 | awk '{print $2}');
#sleep 1; ssh -n $line kill $(ssh -n $line ps aux | grep '[o]rg.apache.flink.runtime.taskmanager.TaskManager ' -m1 | awk '{print $2}');


# (ssh -n $line "kill $(ps aux | grep 'org.apache.flink.runtime.taskmanager.TaskManager ' -m1 | awk '{print $2}');" &)
	#ssh -n $line rm -r /data/1/peel/hadoop-2/data
	#ssh -n $line rm -r /data/2/peel/hadoop-2/data
	#ssh -n $line rm -r /data/3/peel/hadoop-2/data
	#ssh -n $line rm -r /data/4/peel/hadoop-2/data	
done
