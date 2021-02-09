SELECT P.* ,c.category as category,u.userName ,category IN (SELECT  category FROM category) as parentcat 
FROM post as p
LEFT JOIN category as c
ON p.subcateName = c.id  
LEFT JOIN user as u
ON u.user_id = p.userId  
WHERE  p.userId = 3


SELECT P.* ,c.category as category,u.userName ,category IN (SELECT  category FROM category WHERE id = c.parent) as parentcat 
FROM post as p
LEFT JOIN category as c
ON p.subcateName = c.id  
LEFT JOIN user as u
ON u.user_id = p.userId  
WHERE  p.userId = 3


SELECT P.* ,c.category as category,u.userName ,(SELECT  category FROM category WHERE id = c.parent) as parentcat 
FROM post as p
LEFT JOIN category as c
ON p.subcateName = c.id  
LEFT JOIN user as u
ON u.user_id = p.userId  
WHERE  p.userId = 3