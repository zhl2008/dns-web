create database dns_manager;
use dns_manager;

create table dns(
domain varchar(100) not null,
server varchar(50) not null,
ip varchar(50) not null
);

create table admin(
uname varchar(30) not null,
passwd varchar(30) not null,
qq varchar(20),
email varchar(40)
);

create table message(
mid   int(10)   not null PRIMARY KEY AUTO_INCREMENT,
nickname varchar(50) not null,
message varchar(200) not null,
send_time varchar(20) default '0' not null
);

create table modules(
module_name varchar(35) not null,
add_time varchar(20) default '0' not null,
domain varchar(100)  not null
);

/*初始化sql*/
INSERT INTO `admin`(`uname`, `passwd`, `qq`, `email`) VALUES ('haozi','haishihaozigegechuti','do not tell you','zhl2008vvvss@gmail.com')

/*重复15次*/
INSERT INTO `dns`(`domain`, `server`, `ip`) VALUES ('example.com','10.0.0.10','1.1.1.1');

/*重复15次*/
INSERT INTO `message`(`nickname`, `message`, `send_time`) VALUES ('haozi','holyshit','111212121');

/*重复2次*/
INSERT INTO `modules`(`module_name`, `domain`, `add_time`) VALUES ('e618f5dd757c5575af2a995a5c9e7b95.py','example.com','121322323');

INSERT INTO `modules`(`module_name`, `domain`, `add_time`) VALUES ('e618f5dd757c5575af2a995a5c9e7b95.py','example2.com','121322323');

