<?php

	$create_options_table = "CREATE TABLE options ( opt_id int AUTO_INCREMENT, 
													opt_key varchar(120) NOT NULL,
													opt_val varchar(500),
													PRIMARY KEY (opt_id)
												   )";
												   
	$create_historique_tatble = "CREATE TABLE historique (  id int AUTO_INCREMENT, 
															client int NOT NULL,
															date varchar(12) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
															modif double NOT NULL,
  															prevsolde double NOT NULL,
															PRIMARY KEY (id)
													  )";
												   