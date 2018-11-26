DROP TABLE IF EXISTS Minigames;

CREATE TABLE Minigames (
  if_game INT(4)) NOT NULL,
  switch_game INT(4) NOT NULL,
  for_game INT(4) NOT NULL,
  while_game INT(4) NOT NULL,
  variable_game INT(4) NOT NULL,
  array_game INT(4) NOT NULL
);

insert into Minigames values
/* Sample values */
/* -1 is the value that we ignore */
(-1, -1, -1, -1, -1, -1),
(0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0),
(1, 1, 1, 1, 1, 1),
(1, 1, 1, 1, 1, 1),
(1, 1, 1, 1, 1, 1),
(1, 1, 1, 1, 1, 1),
(1, 1, 1, 1, 1, 1);
