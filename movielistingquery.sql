### Displays movie title, theater number, and showtime for a selected complex

select mo.title, p.t_num, p.showtime
from movie mo, play p

#Complex Id will be the users selected cinplex, testing value is 2
where p.cinplex_id = 2 and   
		p.movie_id = mo.id
order by mo.title, p.showtime;

### Displays all the showtimes for all the movies for all the cinema complexes

select c.name, c.addr, mo.title, p.t_num, p.showtime
from cinplex c, movie mo, play p
where c.id = p.cinplex_id and
		p.movie_id = mo.id
order by c.name, mo.title, p.showtime;



