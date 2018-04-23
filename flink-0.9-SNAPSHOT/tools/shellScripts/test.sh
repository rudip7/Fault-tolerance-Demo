scriptdir="$(dirname "$0")"

cd "$scriptdir"

ERR=$1
ERR2=$2
CHECK=$3
LAST=$((ERR/CHECK))
echo $LAST
if [ $((ERR%CHECK)) = "0" ]; then
            LAST=$((LAST-1))
fi
LAST=$((LAST*CHECK))
echo $LAST

ERR2=$((ERR+(ERR2-LAST)-1))
echo $ERR2