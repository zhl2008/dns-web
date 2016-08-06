#!/bin/sh
/bin/sh redisd.sh&
/bin/sh dnsd.sh&
/bin/sh iptables.sh&
/bin/sh port-forwarding.sh&
