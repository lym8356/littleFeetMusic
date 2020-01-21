create table about
(
	id int auto_increment
		primary key,
	heading varchar(100) not null,
	title varchar(100) not null,
	body text null,
	title2 varchar(500) not null,
	body2 text null,
	created datetime null,
	modified datetime null
);

create table childs
(
	id int auto_increment
		primary key,
	first_name varchar(100) not null,
	last_name varchar(100) not null,
	dob date not null,
	note varchar(50) null
);

create table days
(
	id int auto_increment
		primary key,
	name varchar(50) null
);

create table locations
(
	Id int auto_increment
		primary key,
	name varchar(50) not null,
	street_address varchar(50) not null,
	suburb varchar(20) not null,
	post_code int(4) not null,
	note varchar(100) null
);

create table tags
(
	id int auto_increment
		primary key,
	title varchar(191) null,
	created datetime null,
	modified datetime null,
	constraint title
		unique (title)
);

create table terms
(
	id int auto_increment
		primary key,
	name varchar(50) default '0' not null,
	age_group varchar(50) not null,
	location_id int not null,
	start_date date not null,
	end_date date not null,
	day_id int not null,
	week_length int(2) not null,
	start_time time not null,
	end_time time not null,
	duration int(10) not null,
	overflow tinyint(1) default 0 not null,
	capacity int(2) not null,
	casual_rate double default 0 not null,
	note varchar(100) null,
	constraint class_day_fk
		foreign key (day_id) references days (id)
			on update cascade on delete cascade,
	constraint class_location__fk
		foreign key (location_id) references locations (Id)
			on update cascade on delete cascade
);

create table lfmclasses
(
	id int auto_increment
		primary key,
	terms_id int null,
	week_no int null,
	capacity int null,
	price double null,
	overflow tinyint(1) default 0 null,
	class_date date null,
	constraint term_id_fk
		foreign key (terms_id) references terms (id)
			on update cascade on delete cascade
);

create table users
(
	id int(14) auto_increment
		primary key,
	f_name varchar(50) null,
	l_name varchar(50) null,
	username varchar(50) null,
	password varchar(255) null,
	email varchar(50) null,
	phone varchar(25) null,
	birthday date null,
	postcode varchar(20) null,
	role enum('user', 'admin', 'staff') default 'user' null,
	created datetime null,
	modified datetime null
);

create table articles
(
	id int auto_increment
		primary key,
	user_id int not null,
	title varchar(255) not null,
	slug varchar(191) not null,
	body text null,
	published tinyint(1) default 0 null,
	created datetime null,
	modified datetime null,
	constraint slug
		unique (slug),
	constraint articles_ibfk_1
		foreign key (user_id) references users (id)
);

create index user_key
	on articles (user_id);

create table articles_tags
(
	article_id int not null,
	tag_id int not null,
	primary key (article_id, tag_id),
	constraint articles_tags_ibfk_1
		foreign key (tag_id) references tags (id),
	constraint articles_tags_ibfk_2
		foreign key (article_id) references articles (id)
);

create index tag_key
	on articles_tags (tag_id);

create table enrolments
(
	id int auto_increment
		primary key,
	enrolment_type varchar(20) null,
	enrolment_status varchar(20) null,
	enrolment_cost double null,
	lfmclasses_id int not null,
	guardian_id int not null,
	created datetime null,
	modified datetime null,
	child_id int not null,
	constraint enrolments_childs__fk
		foreign key (child_id) references childs (id),
	constraint enrolments_lfmclasses_fk
		foreign key (lfmclasses_id) references lfmclasses (id),
	constraint enrolments_users__fk
		foreign key (guardian_id) references users (id)
);

create index enrol_terms_id
	on enrolments (lfmclasses_id);

create index `enrolments_child-id_uindex`
	on enrolments (child_id);

create table users_childs
(
	id int auto_increment
		primary key,
	child_id int not null,
	user_id int not null,
	relationship varchar(50) not null,
	constraint users_childs_childs__fk
		foreign key (child_id) references childs (id),
	constraint users_childs_users__fk
		foreign key (user_id) references users (id)
);

