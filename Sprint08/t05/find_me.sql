USE ucode_web;

SELECT total.id, total.name FROM (
    SELECT heroes.id, heroes.name FROM heroes
        WHERE heroes.name LIKE BINARY '%a%' AND heroes.race != 'human' AND heroes.class_role IN ('tankman','healer')
) AS total JOIN teams ON total.id = teams.hero_id GROUP BY total.id HAVING COUNT(teams.hero_id) > 1 ORDER BY total.id ASC LIMIT 1;