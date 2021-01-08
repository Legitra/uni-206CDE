## Account permissions;
  
read_only:
select on ar_dnd.*

editing:
select on ar_dnd.*
insert on ar_dnd.*
update on ar_dnd.*

If you need passwords for the accounts, message me on whatsapp. I am the person with the profile picture of a cat with a duck on its head.
  
## Using a client to view the db
  
I recommend using the [HeidiDB](https://www.heidisql.com/) client.   
IP for the database;  
[REMOVED]   
Port:  
3306  
  
In the main settings tab;  
![main settings img](https://i.imgur.com/p53Ejgc.png)  
In the Advanced settings tab;  
![advanced settings img](https://i.imgur.com/vq5Nif7.png)  
  
## Other ways of connecting to the db

http://[IPHERE]/php/get_all_data.php  
-> uses `get_all_data.php`  

This script uses a [post](https://en.wikipedia.org/wiki/POST_(HTTP)) request to take input (The id of the character you want), query the mysql database with the input and return all relvant information relating to it.  
Currently, all information is returned; including NULL values. All values are on a new line with the order being;  
name,  
model,  
race,  
class,  
'---'  
str,  
dex,  
con,  
intel,  
wis,  
cha,  
current_hp,  
max_hp,  
armor,  
speed,  
'---',  
charm,  
deafen,  
fatigue,  
fright,  
grappled,  
incapacitated,  
paralyzed,  
petrified,  
poison,  
prone,  
restrained,  
stun,  
unconcious,  
exhaustion,  
'---'  

> the `'---'` are to mark the end(s) of sections  
I decided to output text this way, as it would be easier for a program to take it all as a single string, then turn it into an array by using the seperators `\n` and `'---'`.

  
http://[IPHERE]/php/input.php  
-> uses `input.php`

Literally just a box that takes input and sends it to the get_all_data script, since post requests are hard to do in vanilla browsers.
