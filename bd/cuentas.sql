
create database Cuentas;

use Cuentas;

create table cuenta (
				
				saldo float,
				cliente varchar(30),
				numero int,
				password text(50),
				primary key(numero)
					);


insert into cuenta values (10.000,'Juan',1010,'123'), (20.000,'Andres',2020,'1234'), (30.000,'Daniel',3030,'12345'), (40.000,'Fernando',4040,'123456');