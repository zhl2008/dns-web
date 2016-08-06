#! /bin/sh
#进程名字可修改
PRO_NAME="python dns.py"

  
while true ; do
  
#    用ps获取$PRO_NAME进程数量
  NUM=`ps aux | grep ${PRO_NAME} | grep -v grep|grep -v su |wc -l`
#  echo $NUM
#    少于1，重启进程
  if [ "${NUM}" -lt "1" ];then
    echo "${PRO_NAME} was killed"
    cd /tmp/dns;su ctf -c "python /tmp/dns/dns.py -p5353 -t"
#    大于1，杀掉所有进程，重启
  elif [ "${NUM}" -gt "1" ];then
    echo "more than 1 ${PRO_NAME},killall ${PRO_NAME}"
    killall -9 $PRO_NAME
    PID=`lsof -i:53 |awk '{print $2}' | tail -n 1`
    while [[ $PID != '' ]];do
	kill -9 $PID
	PID=`lsof -i:53 |awk '{print $2}' | tail -n 1`
    done
  fi
#    kill僵尸进程
  NUM_STAT=`ps aux | grep ${PRO_NAME} | grep T | grep -v grep|grep -v su | wc -l`
  
  if [ "${NUM_STAT}" -gt "0" ];then
    killall -9 ${PRO_NAME}
    cd /tmp/dns;su ctf -c "python /tmp/dns/dns.py -p5353 -t"
  fi
done
  
exit 0
