USE ucode_web;

SELECT total.hero_id, total.points FROM (
    SELECT powers.hero_id, SUM(powers.points) AS points
    FROM powers GROUP BY powers.hero_id
) AS total ORDER BY total.points DESC LIMIT 1;

SELECT total.hero_id, total.points FROM (
    SELECT powers.hero_id, SUM(powers.points) AS points
    FROM powers WHERE powers.type = 'defense'
    GROUP BY powers.hero_id
) AS total ORDER BY total.points ASC LIMIT 1;

SELECT heroes.name, result.sum FROM(
    SELECT total.hero_id, total.sum FROM  (
        SELECT powers.hero_id, SUM(powers.points) as sum FROM (
                SELECT teams.hero_id FROM teams GROUP BY teams.hero_id HAVING COUNT(*)=1
        ) AS first JOIN powers ON first.hero_id=powers.hero_id GROUP BY powers.hero_id
    ) AS total JOIN teams ON total.hero_id = teams.hero_id WHERE teams.name = "Avengers"
) AS result JOIN heroes ON result.hero_id = heroes.id ORDER BY result.sum DESC;

SELECT teams.name, SUM(powers.points) AS sum FROM teams 
JOIN powers ON teams.hero_id=powers.hero_id WHERE teams.name IN ('Avengers', 'Hydra') GROUP BY teams.name ORDER BY SUM(powers.points);