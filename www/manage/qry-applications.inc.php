<?
$sql = 
"SELECT   id,
          kerberos, 
          CONCAT(author_1_last,', ',author_1_first) AS name,
          project_title AS title,
          sponsor_kerberos AS sponsor,
          project_category AS category,
          submitted
FROM      applications 
WHERE     (archived IS NULL or LENGTH(archived)=0) 
  AND     year='".$application_year."'
ORDER BY  submitted DESC";

$result = mysqli_query($conn, $sql);