
ALTER TABLE registration DROP FOREIGN KEY `fk_contest_reg`;
ALTER TABLE registration DROP FOREIGN KEY `fk_tourn_reg`;
ALTER TABLE registration DROP FOREIGN KEY `fk_cat_reg` ;
ALTER TABLE course DROP FOREIGN KEY `fk_tourn_course` ;
ALTER TABLE make DROP FOREIGN KEY `fk_contest_make` ;
ALTER TABLE make DROP FOREIGN KEY `fk_course_make` ;
