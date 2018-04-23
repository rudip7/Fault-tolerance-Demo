

while true
do
        process=`ps aux | grep JobManager | grep -v grep`;
  
        if [[ "$process" == "" ]]; then  
                echo "no JobManager";
		
		#exist=0
		#awk '{print $1}' /share/hadoop/chenxu/slaves | while read line
		#do

	    		#echo "====================";

	    		#echo $line;

			#task=$(ssh -n $line ps aux | grep 'org.apache.flink.runtime.taskmanager.TaskManager ' -m1 | awk '{print $2}' &);
		
			#if [[ "$task" != "" ]]; then 	
				#exist=1;
			#fi
		#done

		#if [[ $exist -eq 0 ]]; then
			break;
		#fi
        else
                echo "Flink is running";
		sleep 60;
        fi
done
