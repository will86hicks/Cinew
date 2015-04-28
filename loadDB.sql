drop table if exists watch;
drop table if exists play;
drop table if exists res_seat_assignments;
drop table if exists seat;
drop table if exists reservation;
drop table if exists theater;
drop table if exists member;
drop table if exists membership;
drop table if exists movie;
drop table if exists cinplex;

create table cinplex
(
	name		varchar(32), 
	addr		varchar(50),
	phone		varchar(13),
	id			int auto_increment NOT NULL,
	
	primary key(id)
)
engine = InnoDB;

create table movie
(
	title		varchar(32),
	descr		varchar(150),
	runtime		int,
	rating		varchar(6),
	stars		varchar(1500),
	id			int auto_increment NOT NULL,

	primary key (id)
)
engine = InnoDB;

create table membership
(
	acct					int NOT NULL auto_increment,
	prim_member	int NOT NULL references member(id),
	start_date			date,
	end_date			date,
	
	primary key (acct)
)
engine = InnoDB;

create table member
(
	id						int NOT NULL auto_increment,
	f_name					varchar(50),
	l_name					varchar(50),
	addr					varchar(50),
	age						int,
	email					varchar(100),
	phone					varchar(13),
	membership_acct	int NOT NULL references membership(acct),
	primary key (id)
)
engine = InnoDB;

create table theater
(
	number			int,
	cinplex_id		varchar(32) references cinplex(id),
	cap				int,
	seat_chart		varchar(16),

	primary key	(number, cinplex_id)
)
engine = InnoDB;

create table seat
(
	row						int,
	col						int,
	theater_number		int references theater(number),
	cinplex_id				varchar(32) references cinplex(id),
	reserv_id				int references reservation(id),
				
	primary key (row, col, theater_number, cinplex_id, reserv_id)
)
engine = InnoDB;

create table reservation
(
	id 					int NOT NULL auto_increment,
	cinplex			int,
	theater			int,
	movie			varchar(32),
	date_time  		datetime,
	member_id		int references member(id),
	acct 				varchar(16) references membership(acct),
				
	primary key (id,member_id, acct)
)
engine = InnoDB;

create table res_seat_assignments
(
	reserv_id 	int references reservation(id),
	seat_no		varchar(16),

	primary key(reserv_id, seat_no)
)
engine = InnoDB;

create table watch
(
	member_id	int references member(id),
	acct 				varchar(16) references membership(acct),
	movie_id		int references movie(id),
				
	primary key(member_id, acct, movie_id)
)
engine = InnoDB;

create table play
(
	t_num		int references theater(number),
	cinplex_id	varchar(32) references cinplex(id),
	showtime	datetime,
	movie_id	int references movie(id),
	
	primary key(t_num, cinplex_id, showtime, movie_id)
)
engine = InnoDB;

select 'Loading data into cinplex table';
delete from cinplex;
show warnings;
load data local infile 'cinplex.data' 
replace
into table cinplex
fields terminated by '.';
#
select 'Loading data into movie table';
delete from movie;
show warnings;
load data local infile 'movie.data' 
replace
into table movie
fields terminated by ',';
#
select 'Loading data into membership table';
delete from membership;
show warnings;
load data local infile 'membership.data' 
replace
into table membership
fields terminated by ',';
#
select 'Loading data into member table';
delete from member;
show warnings;
load data local infile 'member.data' 
replace
into table member
fields terminated by ';';
#
select 'Loading data into theater table';
delete from theater;
show warnings;
load data local infile 'theater.data' 
replace
into table theater
fields terminated by '.';
#
select 'Loading data into reservation table';
delete from reservation;
show warnings;
load data local infile 'reservation.data' 
replace
into table reservation
fields terminated by ',';
#
select 'Loading data into seat table';
delete from seat;
show warnings;
load data local infile 'seat.data' 
replace
into table seat
fields terminated by ',';
#
select 'Loading data into res_seat_assignments table';
delete from res_seat_assignments;
show warnings;
load data local infile 'res_seat_assignments.data' 
replace
into table res_seat_assignments
fields terminated by ',';
#
select 'Loading data into play table';
delete from play;
show warnings;
load data local infile 'play.data' 
replace
into table play
fields terminated by ',';
#
select 'Loading data into watch table';
delete from watch;
show warnings;
load data local infile 'watch.data' 
replace
into table watch
fields terminated by ',';