drop table Leave_Record;
drop table Payment_Details;
drop table Plan_Details;
drop table Schedule_Details;
drop table TrainerWorkout_Allocation;
drop table Trainer_Details;
drop table Workout_Details;
drop table Member_Details;
drop table Chat_Details;
SET FOREIGN_KEY_CHECKS=0;
create table Member_Details(
        MemberID integer not null PRIMARY KEY AUTO_INCREMENT,
        username varchar(30) not null unique,
        email varchar(20) not null,
        phone bigint not null,
        age integer not null,
        gender char(1) not null,
        joiningdates Date ,
        password varchar(20) not null,
        currenttrainerid integer references Trainer_Details(TrainerID),
        currentplanid integer references Plan_Details(PlanId))ENGINE=Innodb,AUTO_INCREMENT=1001;
insert into Member_Details values(1001,'Gon','gon@gmail.com',9911223344,23,'M','2021-08-04','gon@123',10001,101);
insert into Member_Details values(1002,'Clare','cla@gmail.com',9900023343,22,'F',NULL,'cla234',10002,101);
insert into Member_Details values(1003,'Ron','ron@gmail.com',9911023343,21,'M',NULL,'ron@345',10003,102);
insert into Member_Details values(1004,'Raven','raven@gmail.com',9911923349,25,'F','2021-07-22','rav@321',10004,103);
insert into Member_Details values(1005,'Roman','roman@gmail.com',9900123349,23,'M','2021-08-05','rom@007',10005,104);
create table Trainer_Details(
        TrainerID integer PRIMARY KEY AUTO_INCREMENT,
        name varchar(20) not null,
        Email VARCHAR(20) not null,
        phone bigint not null,
        age integer not null,
        gender char(1) not null,
        joiningdate date,
        password varchar(10) not null,
        experience float not null)
ENGINE=Innodb,AUTO_INCREMENT=10001;

insert into Trainer_Details values(10001,'Harry','harry@mail.com',9001123312,22,'M','2020-03-03','harry12',3.6);
insert into Trainer_Details values(10002,'Pauline','pauline@mail.com',9900121234,23,'F','2020-02-03','pauline@12',3.0);
insert into Trainer_Details values(10003,'Max','max@mail.com',8812120012,21,'M','2019-04-05','max_123',3.5);
insert into Trainer_Details values(10004,'Uraraka','ura@mail.com',9090121121,24,'F','2019-04-03','ura@909',4.0);
insert into Trainer_Details values(10005,'Mica','mica@mail.com',9191005671,25,'F','2019-05-04','mic_007',5.0);

create table Plan_Details(
        PlanId integer PRIMARY KEY AUTO_INCREMENT,
        PlanName varchar(30) not null,
        Period text not null,
        Amount integer not null)
ENGINE=Innodb AUTO_INCREMENT=101;
insert into Plan_Details values(101,'Starter','60',4000);
insert into Plan_Details values(102,'Intermediate','90',5000);
insert into Plan_Details values(103,'Expert','120',7000);
insert into Plan_Details values(104,'Platinum','140',9000);



create table Workout_Details(
        WorkoutID integer not null PRIMARY KEY AUTO_INCREMENT,
        WorkoutName varchar(20) not null,
        Description text not null)
ENGINE=Innodb;
insert into Workout_Details values(1,'Bicep Curl','Exercise for Biceps');
insert into Workout_Details values(2,'Bar Chin Up','Excerise for Warmup');
insert into Workout_Details values(3,'Tricep Curl','Excerise for Tricep');
insert into Workout_Details values(4,'Chest Press','Excerise for Chest');
create table Schedule_Details(ScheduleId integer PRIMARY KEY AUTO_INCREMENT,
        MemberID integer not null,
        TrainerID integer not null,
        WorkoutID integer not null,
        foreign key(MemberID) references Member_Details(MemberID),
        foreign key(TrainerID) references Trainer_Details(TrainerID),
        foreign key(WorkoutID) references Workout_Details(WorkoutID))
ENGINE=Innodb AUTO_INCREMENT=200;
insert into Schedule_Details values(200,1001,10001,1);
insert into Schedule_Details values(201,1002,10002,2);


create table Leave_Record
(
        LeaveID integer PRIMARY KEY AUTO_INCREMENT,
        TrainerID integer not null,
        Reason varchar(30) not null,
        FromDate date not null,
        ToDate date not null,
        Status Enum ("Pending", "Accepted","Rejected"),
        foreign key(TrainerID) references Trainer_Details(TrainerID)
)ENGINE=Innodb;

insert into Leave_Record values(1,10001,'Fever','2021-08-16','2021-08-21','Pending');
create table TrainerWorkout_Allocation(
        AllocationID integer primary key AUTO_INCREMENT,
        TrainerId integer not null,
        WorkoutID integer not null,
        foreign key(TrainerId) references Trainer_Details(TrainerID),
        foreign key(WorkoutID) references Workout_Details(WorkoutID))
ENGINE=Innodb AUTO_INCREMENT=2001;
insert into TrainerWorkout_Allocation values(2001,10001,1);insert into TrainerWorkout_Allocation values(2002,10002,2);

create table Payment_Details(
        PaymentID integer PRIMARY KEY AUTO_INCREMENT,
        MemberID integer not null,
        TrainerID integer not null,
        PlanId integer not null,
        date date not null,
        Amount integer not null,
        Status enum('Pending','Completed') not null,
        ModeofPayment enum('Credit Card','Debit Card'),
        Foreign Key(MemberID) references Member_Details(MemberID),
        Foreign Key(TrainerID) references Trainer_Details(TrainerID),
        Foreign Key(PlanId) references Plan_Details(PlanId))ENGINE=Innodb;
insert into Payment_Details values(1,1002,10003,104,'2021-05-18',9000,'Pending',NULL);
create table Chat_Details(
        ChatID integer primary key AUTO_INCREMENT,
        Sender VARCHAR(30) not null,
	Message VARCHAR(50) not null,
	clock timestamp default CURRENT_TIMESTAMP)
ENGINE=Innodb AUTO_INCREMENT=1;