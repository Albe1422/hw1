
Create database musica;

Use musica;

create table users( 
    nome char(255) not null,
    cognome char(255) not null,   
    username char(16) primary key,  
    email char(255) not null unique,  
    password char(255) not null)  
    engine =Inno

create table articoli(
    autore varchar(255) , 
    titolo varchar(255) primary key, 
    contenuto varchar(255), 
    img varchar(255) not null) 
    Engine='InnoDB'; 

create table likes(
    username varchar(255),
    titolo varchar(255), 
    index usernamex(username), 
    index titolox(titolo), 
    foreign key(username) references users(username) on update cascade,
    foreign key(titolo) references articoli(titolo) on update cascade,
    primary key(username,titolo))
    engine='Innodb';