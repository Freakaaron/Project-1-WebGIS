# Project 1
The files that have been edits include `template.php`, `template.html`, and `template.map`.
* The change in the php file includes changes to direct the php file to the map file.
* The changes in the map file include the SQL query as well as the various symbols that are used for the respective queries for better visibility.
* The changes in HTML include the changes in reference to each query so that the required output can be displayed.

# Task Queries
* **First Query** - the_geom from (SELECT * FROM aoi) as foo using unique gid using srid=2236;
* **Second Query** - the_geom from (SELECT h.the_geom as the_geom FROM hw h WHERE h.georte IN (SELECT georte AS highway FROM hw GROUP BY georte HAVING COUNT(route) > 1 ORDER BY georte)) as foo using unique the_geom using srid=2236;
* **Third Query** - the_geom FROM (SELECT gid, the_geom FROM cd WHERE borocd::text LIKE '4%' ORDER BY gid) as foo using unique the_geom using srid=2236;
* **Fourth Query** - the_geom FROM (SELECT ST_ConvexHull((ST_Collect(the_geom))) as the_geom from aoi) as foo using unique the_geom using srid=2236;
* **Fitfth Query** - the_geom FROM (SELECT ST_Buffer(the_geom, 5000) as the_geom FROM hw) as foo using unique the_geom using srid=2236;
* **Sixth Problem Queries**
  
  * **First Query** - the_geom from (SELECT ST_INTERSECTION(cg.the_geom, sd.the_geom) as the_geom FROM cg, sd, aoi WHERE aoi.gid = 79) as foo using unique the_geom using srid=2236;
  *  **Second Query** - the_geom from (SELECT ST_Union(sd.the_geom, cg.the_geom) as the_geom FROM cg, sd, aoi WHERE aoi.gid = 79) as foo using unique the_geom using srid=2236;
  *  **Third Query** - the_geom from (SELECT ST_Difference(cg.the_geom, sd.the_geom) as the_geom FROM cg, sd, aoi WHERE aoi.gid = 79) as foo using unique the_geom using srid=2236;
  *  **Fourth Query** - the_geom from (SELECT ST_Difference(sd.the_geom, cg.the_geom) as the_geom FROM cg, sd, aoi WHERE aoi.gid = 79) as foo using unique the_geom using srid=2236;
  *  **Fifth Query** - the_geom from (SELECT ST_SymDifference(cg.the_geom, sd.the_geom) as the_geom FROM cg, sd, aoi WHERE aoi.gid = 79) as foo using unique the_geom using srid=2236;

# Results
Please find the outputs of the above queries in the following links:

1. ![Task1a](/Task1a.png)
2. ![Task1b](/Task1b.png)
3. ![Task1c](/Task1c.png)
4. ![Task1d](/Task1d.png)
5. ![Task1e](/Task1e.png)
6. 
   1. ![Task1fa](/Task1fa.png)
   2. ![Task1fb](/Task1fb.png)
   3. ![Task1fc](/Task1fc.png)
   4. ![Task1fd](/Task1fd.png)
   5. ![Task1fe](/Task1fe.png)