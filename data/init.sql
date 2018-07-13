CREATE DATABASE kunjapur;

use kunjapur;

CREATE TABLE strains (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	cell VARCHAR(30) NOT NULL,
	genus VARCHAR(30) NOT NULL,
	species VARCHAR(50) NOT NULL,
	strain INT(3),
	paren_strain VARCHAR(50),
  plasmid_name VARCHAR(50),
  plasmid_genotype VARCHAR(50),
  copy_number INT(3),
  antibiotic_resistance VARCHAR(50),
  construction VARCHAR(200),
  sequence VARCHAR(5)
	date TIMESTAMP
);
