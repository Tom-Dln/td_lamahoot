LOAD DATA INFILE 'questions-answers.csv'
    INTO TABLE `lamahoot`.questions
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\n'
    IGNORE 1 LINES
    (culture,theme_id,type,question_name,answer_1, answer_2,answer_3,answer_4,right_answer);
