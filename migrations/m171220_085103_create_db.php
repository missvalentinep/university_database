<?php

use yii\db\Migration;

/**
 * Class m171220_085103_create_db
 */
class m171220_085103_create_db extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->execute("CREATE TABLE published_work_type
(
  type VARCHAR(100) NOT NULL,
  points INT NOT NULL,
  type_id INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (type_id) 
);

CREATE TABLE activity_type
(
  type VARCHAR(100) NOT NULL,
  points INT NOT NULL,
  type_id INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (type_id)
);

CREATE TABLE course
(
  course_id INT NOT NULL AUTO_INCREMENT,
  course_title INT NOT NULL,
  PRIMARY KEY (course_id)
);

CREATE TABLE department
(
  department_name VARCHAR(255) NOT NULL,
  department_id INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (department_id)
);

CREATE TABLE employee
(
  employee_id VARCHAR(5) NOT NULL,
  full_name VARCHAR(100) NOT NULL,
  occupation VARCHAR(255) NOT NULL,
  date_of_birth DATE NOT NULL,
  graduation_information VARCHAR(255) NOT NULL,
  science_degree VARCHAR(100) NOT NULL,
  academic_title VARCHAR(100) NOT NULL,
  start_of_work DATE NOT NULL,
  length_of_employment INT NOT NULL,
  last_advanced_training VARCHAR(255) NOT NULL,
  department_id INT NOT NULL,
  PRIMARY KEY (employee_id),
  FOREIGN KEY (department_id) REFERENCES department(department_id) ON UPDATE CASCADE ON DELETE NO ACTION
);

CREATE TABLE published_work
(
  publication_id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  number_of_pages INT NOT NULL,
  number_of_authors INT NOT NULL,
  date_published DATE NOT NULL,
  supporting_documents VARCHAR(255) NOT NULL,
  comment VARCHAR(255) NOT NULL,
  type_id INT NOT NULL,
  PRIMARY KEY (publication_id),
  FOREIGN KEY (type_id) REFERENCES published_work_type(type_id) ON UPDATE CASCADE ON DELETE NO ACTION
);

CREATE TABLE employee_published_work
(
  entry_id INT NOT NULL AUTO_INCREMENT,
  employee_id VARCHAR(5) NOT NULL,
  publication_id INT NOT NULL,
  PRIMARY KEY (entry_id),
  FOREIGN KEY (employee_id) REFERENCES employee(employee_id) ON UPDATE CASCADE ON DELETE NO ACTION,
  FOREIGN KEY (publication_id) REFERENCES published_work(publication_id) ON UPDATE CASCADE ON DELETE NO ACTION
);

CREATE TABLE activity
(
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  supporting_documents VARCHAR(255) NOT NULL,
  activity_id INT NOT NULL AUTO_INCREMENT,
  type_id INT NOT NULL,
  comment VARCHAR(255) NOT NULL,
  PRIMARY KEY (activity_id),
  FOREIGN KEY (type_id) REFERENCES activity_type(type_id) ON UPDATE CASCADE ON DELETE NO ACTION
);

CREATE TABLE employee_activity
(
  entry_id INT NOT NULL AUTO_INCREMENT,
  activity_id INT NOT NULL,
  employee_id VARCHAR(5) NOT NULL,
  PRIMARY KEY (entry_id),
  FOREIGN KEY (activity_id) REFERENCES activity(activity_id) ON UPDATE CASCADE ON DELETE NO ACTION,
  FOREIGN KEY (employee_id) REFERENCES employee(employee_id) ON UPDATE CASCADE ON DELETE NO ACTION
);

CREATE TABLE publications_at_IB
(
  indexation_base INT NOT NULL,
  points INT NOT NULL,
  entry_id INT NOT NULL AUTO_INCREMENT,
  publication_id INT NOT NULL,
  PRIMARY KEY (entry_id),
  FOREIGN KEY (publication_id) REFERENCES published_work(publication_id) ON UPDATE CASCADE ON DELETE NO ACTION
);

CREATE TABLE employee_courses
(
  year INT NOT NULL,
  semester INT NOT NULL,
  credit_points INT NOT NULL,
  entry_id INT NOT NULL AUTO_INCREMENT,
  course_id INT NOT NULL,
  employee_id VARCHAR(5) NOT NULL,
  PRIMARY KEY (entry_id),
  FOREIGN KEY (course_id) REFERENCES course(course_id) ON UPDATE CASCADE ON DELETE NO ACTION,
  FOREIGN KEY (employee_id) REFERENCES employee(employee_id) ON UPDATE CASCADE ON DELETE NO ACTION
);");
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->execute("DROP TABLE IF EXISTS published_work_type, activity_type, course, department, employee, published_work, activity,
publications_at_IB, employee_courses, employee_activity, employee_published_work;");
    }


}
