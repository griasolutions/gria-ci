CREATE TABLE jobs (
  id int primary key,
  name varchar(150),
  repository_url varchar(255),
  code_coverage int,
  phpmd_is_enabled boolean,
  phpmd_minimum_priority tinyint,
  phpcs_is_enabled boolean,
  phpcs_ruleset varchar(255),
  deploy_destination_type varchar(10),
  deploy_destination_path varchar(255),
  deploy_destination_username varchar(100),
  deploy_destination_server_1 varchar(255),
  deploy_destination_server_2 varchar(255),
  deploy_destination_server_3 varchar(255),
  deploy_destination_server_4 varchar(255)
);

CREATE TABLE triggers (
  id int primary key,
  name varchar(25)
);

INSERT INTO triggers values(null, 'manual');
INSERT INTO triggers values(null, 'commit');
INSERT INTO triggers values(null, 'build');

CREATE TABLE status (
  id int primary key,
  name varchar(10)
);

INSERT INTO status values(null, 'success');
INSERT INTO status values(null, 'failure');
INSERT INTO status values(null, 'pending');

CREATE TABLE builds (
  id int primary key,
  job_id int,
  trigger_id int,
  status_id int,
  username varchar(255),
  source varchar(25),
  start_time datetime,
  end_time datetime
);