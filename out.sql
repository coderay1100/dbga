--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: dbga; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA dbga;


ALTER SCHEMA dbga OWNER TO postgres;

--
-- Name: SCHEMA dbga; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA dbga IS 'Database Group Assignment';


--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = dbga, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: activity; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE activity (
    cv_id integer NOT NULL,
    activity character varying(50)
);


ALTER TABLE dbga.activity OWNER TO postgres;

--
-- Name: alumnus; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE alumnus (
    id integer NOT NULL,
    applicant_id integer,
    enroll_year integer,
    grad_year integer
);


ALTER TABLE dbga.alumnus OWNER TO postgres;

--
-- Name: applicant; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE applicant (
    id integer NOT NULL,
    cv_id integer,
    date_time timestamp without time zone,
    status boolean,
    job_id integer
);


ALTER TABLE dbga.applicant OWNER TO postgres;

--
-- Name: applicant_id_seq; Type: SEQUENCE; Schema: dbga; Owner: postgres
--

CREATE SEQUENCE applicant_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE dbga.applicant_id_seq OWNER TO postgres;

--
-- Name: applicant_id_seq; Type: SEQUENCE OWNED BY; Schema: dbga; Owner: postgres
--

ALTER SEQUENCE applicant_id_seq OWNED BY applicant.id;


--
-- Name: award; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE award (
    cv_id integer NOT NULL,
    award character varying(50)
);


ALTER TABLE dbga.award OWNER TO postgres;

--
-- Name: company; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE company (
    id integer NOT NULL,
    name character varying(50) NOT NULL,
    email character varying(30) NOT NULL,
    owner_id integer,
    password character varying(30),
    faculty_id integer
);


ALTER TABLE dbga.company OWNER TO postgres;

--
-- Name: company_id_seq; Type: SEQUENCE; Schema: dbga; Owner: postgres
--

CREATE SEQUENCE company_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE dbga.company_id_seq OWNER TO postgres;

--
-- Name: company_id_seq; Type: SEQUENCE OWNED BY; Schema: dbga; Owner: postgres
--

ALTER SEQUENCE company_id_seq OWNED BY company.id;


--
-- Name: cv; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE cv (
    company character varying(50),
    "position" character varying(50),
    location character varying(50),
    start_date date,
    end_date date,
    honor character varying(50),
    study_field character varying(50),
    gpa double precision,
    start_year numeric(4,0),
    end_year numeric(4,0),
    degree character varying(30),
    school character varying(50),
    id integer NOT NULL
);


ALTER TABLE dbga.cv OWNER TO postgres;

--
-- Name: cv_activity; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE cv_activity (
    applicant_id integer NOT NULL,
    activity character varying(50)
);


ALTER TABLE dbga.cv_activity OWNER TO postgres;

--
-- Name: cv_award; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE cv_award (
    applicant_id integer NOT NULL,
    award character varying(50)
);


ALTER TABLE dbga.cv_award OWNER TO postgres;

--
-- Name: cv_id_seq; Type: SEQUENCE; Schema: dbga; Owner: postgres
--

CREATE SEQUENCE cv_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE dbga.cv_id_seq OWNER TO postgres;

--
-- Name: cv_id_seq; Type: SEQUENCE OWNED BY; Schema: dbga; Owner: postgres
--

ALTER SEQUENCE cv_id_seq OWNED BY cv.id;


--
-- Name: faculty; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE faculty (
    id integer NOT NULL,
    name character varying(50) NOT NULL
);


ALTER TABLE dbga.faculty OWNER TO postgres;

--
-- Name: faculty_id_seq; Type: SEQUENCE; Schema: dbga; Owner: postgres
--

CREATE SEQUENCE faculty_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE dbga.faculty_id_seq OWNER TO postgres;

--
-- Name: faculty_id_seq; Type: SEQUENCE OWNED BY; Schema: dbga; Owner: postgres
--

ALTER SEQUENCE faculty_id_seq OWNED BY faculty.id;


--
-- Name: faculty_member; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE faculty_member (
    id integer NOT NULL,
    email character varying(30) NOT NULL,
    password character varying(15) NOT NULL,
    fname character varying(30) NOT NULL,
    lname character varying(30),
    faculty_id integer,
    gender character(1),
    cv_id integer
);


ALTER TABLE dbga.faculty_member OWNER TO postgres;

--
-- Name: faculty_member_id_seq; Type: SEQUENCE; Schema: dbga; Owner: postgres
--

CREATE SEQUENCE faculty_member_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE dbga.faculty_member_id_seq OWNER TO postgres;

--
-- Name: faculty_member_id_seq; Type: SEQUENCE OWNED BY; Schema: dbga; Owner: postgres
--

ALTER SEQUENCE faculty_member_id_seq OWNED BY faculty_member.id;


--
-- Name: full_time_job; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE full_time_job (
    job_id integer NOT NULL,
    working_hours integer
);


ALTER TABLE dbga.full_time_job OWNER TO postgres;

--
-- Name: internship; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE internship (
    job_id integer NOT NULL,
    duration integer
);


ALTER TABLE dbga.internship OWNER TO postgres;

--
-- Name: job; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE job (
    id integer NOT NULL,
    title character varying(50) NOT NULL,
    owner_id integer,
    faculty_id integer,
    requirement double precision,
    description text,
    industry character varying(30),
    address character varying(100),
    city character varying(30),
    province character varying(30),
    country character varying(30)
);


ALTER TABLE dbga.job OWNER TO postgres;

--
-- Name: job_id_seq; Type: SEQUENCE; Schema: dbga; Owner: postgres
--

CREATE SEQUENCE job_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE dbga.job_id_seq OWNER TO postgres;

--
-- Name: job_id_seq; Type: SEQUENCE OWNED BY; Schema: dbga; Owner: postgres
--

ALTER SEQUENCE job_id_seq OWNED BY job.id;


--
-- Name: job_owner; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE job_owner (
    id integer NOT NULL
);


ALTER TABLE dbga.job_owner OWNER TO postgres;

--
-- Name: job_owner_id_seq; Type: SEQUENCE; Schema: dbga; Owner: postgres
--

CREATE SEQUENCE job_owner_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE dbga.job_owner_id_seq OWNER TO postgres;

--
-- Name: job_owner_id_seq; Type: SEQUENCE OWNED BY; Schema: dbga; Owner: postgres
--

ALTER SEQUENCE job_owner_id_seq OWNED BY job_owner.id;


--
-- Name: lecturer; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE lecturer (
    id integer NOT NULL,
    owner_id integer,
    salary integer,
    bank_account numeric(15,0)
);


ALTER TABLE dbga.lecturer OWNER TO postgres;

--
-- Name: part_time_job; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE part_time_job (
    job_id integer NOT NULL,
    salary_per_hour integer,
    hours_per_week integer
);


ALTER TABLE dbga.part_time_job OWNER TO postgres;

--
-- Name: research_project; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE research_project (
    job_id integer NOT NULL,
    leader character varying(50),
    goals text
);


ALTER TABLE dbga.research_project OWNER TO postgres;

--
-- Name: student; Type: TABLE; Schema: dbga; Owner: postgres; Tablespace: 
--

CREATE TABLE student (
    id integer NOT NULL,
    current_program character(1) NOT NULL,
    applicant_id integer,
    enroll_year integer
);


ALTER TABLE dbga.student OWNER TO postgres;

--
-- Name: id; Type: DEFAULT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY applicant ALTER COLUMN id SET DEFAULT nextval('applicant_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY company ALTER COLUMN id SET DEFAULT nextval('company_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY cv ALTER COLUMN id SET DEFAULT nextval('cv_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY faculty ALTER COLUMN id SET DEFAULT nextval('faculty_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY faculty_member ALTER COLUMN id SET DEFAULT nextval('faculty_member_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY job ALTER COLUMN id SET DEFAULT nextval('job_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY job_owner ALTER COLUMN id SET DEFAULT nextval('job_owner_id_seq'::regclass);


--
-- Data for Name: activity; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY activity (cv_id, activity) FROM stdin;
1	Student Org
1	Student
\.


--
-- Data for Name: alumnus; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY alumnus (id, applicant_id, enroll_year, grad_year) FROM stdin;
2	\N	2006	2012
6	\N	2008	2012
7	\N	2007	2012
8	\N	2006	2010
9	\N	2000	2002
10	\N	2003	2008
\.


--
-- Data for Name: applicant; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY applicant (id, cv_id, date_time, status, job_id) FROM stdin;
1	1	2013-12-08 14:25:55.747	f	3
\.


--
-- Name: applicant_id_seq; Type: SEQUENCE SET; Schema: dbga; Owner: postgres
--

SELECT pg_catalog.setval('applicant_id_seq', 2, true);


--
-- Data for Name: award; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY award (cv_id, award) FROM stdin;
1	Best Luck
1	Best Brain
\.


--
-- Data for Name: company; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY company (id, name, email, owner_id, password, faculty_id) FROM stdin;
1	Google	contact@gmail.com	1	password	1
2	Microsovt	micro@sovt.com	2	1234	1
3	Bayern Med	bayern@med.com	3	1234	2
4	Advocate Inc.	advocate@inc.com	4	1234	4
5	Daihatsun Motors	daihatsun@motors.com	5	1234	3
6	Communication Inc.	Com@inc.com	6	1234	5
7	Apple Inc.	apple@inc.com	7	1234	1
8	Ford 	fors@cars.com	8	1234	3
9	Paracetamol Inc.	para@cetamol.com	9	1234	2
10	Kia Motors	kia@motors.com	10	1234	3
\.


--
-- Name: company_id_seq; Type: SEQUENCE SET; Schema: dbga; Owner: postgres
--

SELECT pg_catalog.setval('company_id_seq', 10, true);


--
-- Data for Name: cv; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY cv (company, "position", location, start_date, end_date, honor, study_field, gpa, start_year, end_year, degree, school, id) FROM stdin;
Google	CEO		2000-10-10	2001-10-10	-	Computer Science	3.7000000000000002	2012	2015	Bachelor	University of Indonesia	1
\.


--
-- Data for Name: cv_activity; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY cv_activity (applicant_id, activity) FROM stdin;
\.


--
-- Data for Name: cv_award; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY cv_award (applicant_id, award) FROM stdin;
\.


--
-- Name: cv_id_seq; Type: SEQUENCE SET; Schema: dbga; Owner: postgres
--

SELECT pg_catalog.setval('cv_id_seq', 1, true);


--
-- Data for Name: faculty; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY faculty (id, name) FROM stdin;
1	Faculty of Computer Science
2	Medical School
3	Faculty Of Engineering
4	Faculty of Law
5	Faculty of Political Science
\.


--
-- Name: faculty_id_seq; Type: SEQUENCE SET; Schema: dbga; Owner: postgres
--

SELECT pg_catalog.setval('faculty_id_seq', 5, true);


--
-- Data for Name: faculty_member; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY faculty_member (id, email, password, fname, lname, faculty_id, gender, cv_id) FROM stdin;
2	nuryahya.prasetyo@ui.ac.id	password	Nuryahya	Prasetyo	1	m	\N
3	bondry@gmail.com	password	Handri	Santoso	1	m	\N
1	raibima.imam@ui.ac.id	password	Raibima	Putra	1	m	1
4	gavin@norman.com	1234	gavin	norman	2	M	\N
5	rendy@yonas.com	1234	rendy	yonas	3	M	\N
6	Maha@mubarak.com	1234	maha	mubarak	4	F	\N
7	Rifky@ryan.com	1234	rifky	ryan	5	M	\N
8	Mar@shila.com	1234	marshila	\N	1	F	\N
9	Dul@avila.com	1234	dul	avila	2	M	\N
10	Kus@nur.com	1234	kus	nur	3	M	\N
11	aidi@fauzan.com	1234	aidi	fauzan	4	M	\N
12	Susilo@bangbang.com	1234	susilo	bangbang	4	M	\N
13	Lea@jessy.com	1234	lea	jessy	2	F	\N
14	Fay@bee.com	1234	fay	bee	5	F	\N
15	Taiocruz@cruz.com	1234	taio	cruz	4	F	\N
\.


--
-- Name: faculty_member_id_seq; Type: SEQUENCE SET; Schema: dbga; Owner: postgres
--

SELECT pg_catalog.setval('faculty_member_id_seq', 15, true);


--
-- Data for Name: full_time_job; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY full_time_job (job_id, working_hours) FROM stdin;
1	8
\.


--
-- Data for Name: internship; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY internship (job_id, duration) FROM stdin;
2	10
\.


--
-- Data for Name: job; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY job (id, title, owner_id, faculty_id, requirement, description, industry, address, city, province, country) FROM stdin;
2	Database Administrator	1	1	3	Cupcake ipsum dolor sit amet danish I love powder. Candy canes macaroon ice cream cupcake danish tart bear claw. I love jelly beans cake apple pie donut chocolate cake muffin jelly-o pudding.	Information Technology	Mountain View	Silicon Valley	California	USA
1	Software Engineer	1	1	3.2999999999999998	Cupcake ipsum dolor sit amet apple pie brownie bear claw. I love jujubes I love chupa chups pie. Icing I love jujubes. Candy canes candy canes gingerbread chupa chups bonbon I love candy canes pie chocolate bar.	Information Technology	Mountain View	Silicon Valley	California	USA
3	TA: Calculus 2012	2	1	3.5	Teaching assistant for 2012 Calculus class	Educational	Universitas Indonesia	Depok	West Java	Indonesia
\.


--
-- Name: job_id_seq; Type: SEQUENCE SET; Schema: dbga; Owner: postgres
--

SELECT pg_catalog.setval('job_id_seq', 5, true);


--
-- Data for Name: job_owner; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY job_owner (id) FROM stdin;
1
2
3
4
5
6
7
8
9
10
\.


--
-- Name: job_owner_id_seq; Type: SEQUENCE SET; Schema: dbga; Owner: postgres
--

SELECT pg_catalog.setval('job_owner_id_seq', 10, true);


--
-- Data for Name: lecturer; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY lecturer (id, owner_id, salary, bank_account) FROM stdin;
3	2	\N	\N
11	1	12000	1111
12	3	12000	2222
13	4	12000	3333
14	5	12000	4444
15	6	12000	5555
\.


--
-- Data for Name: part_time_job; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY part_time_job (job_id, salary_per_hour, hours_per_week) FROM stdin;
3	\N	\N
\.


--
-- Data for Name: research_project; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY research_project (job_id, leader, goals) FROM stdin;
\.


--
-- Data for Name: student; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY student (id, current_program, applicant_id, enroll_year) FROM stdin;
1	u	1	2012
2	u	\N	2006
3	u	\N	2011
4	M	\N	2006
5	u	\N	2012
\.


--
-- Name: applicant_pkey; Type: CONSTRAINT; Schema: dbga; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY applicant
    ADD CONSTRAINT applicant_pkey PRIMARY KEY (id);


--
-- Name: company_email_key; Type: CONSTRAINT; Schema: dbga; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY company
    ADD CONSTRAINT company_email_key UNIQUE (email);


--
-- Name: company_pkey; Type: CONSTRAINT; Schema: dbga; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY company
    ADD CONSTRAINT company_pkey PRIMARY KEY (id);


--
-- Name: cv_pkey; Type: CONSTRAINT; Schema: dbga; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cv
    ADD CONSTRAINT cv_pkey PRIMARY KEY (id);


--
-- Name: faculty_member_email_key; Type: CONSTRAINT; Schema: dbga; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY faculty_member
    ADD CONSTRAINT faculty_member_email_key UNIQUE (email);


--
-- Name: faculty_member_pkey; Type: CONSTRAINT; Schema: dbga; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY faculty_member
    ADD CONSTRAINT faculty_member_pkey PRIMARY KEY (id);


--
-- Name: faculty_name_key; Type: CONSTRAINT; Schema: dbga; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY faculty
    ADD CONSTRAINT faculty_name_key UNIQUE (name);


--
-- Name: faculty_pkey; Type: CONSTRAINT; Schema: dbga; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY faculty
    ADD CONSTRAINT faculty_pkey PRIMARY KEY (id);


--
-- Name: job_owner_pkey; Type: CONSTRAINT; Schema: dbga; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY job_owner
    ADD CONSTRAINT job_owner_pkey PRIMARY KEY (id);


--
-- Name: job_pkey; Type: CONSTRAINT; Schema: dbga; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY job
    ADD CONSTRAINT job_pkey PRIMARY KEY (id);


--
-- Name: activity_cv_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY activity
    ADD CONSTRAINT activity_cv_id_fkey FOREIGN KEY (cv_id) REFERENCES cv(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: alumnus_applicant_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY alumnus
    ADD CONSTRAINT alumnus_applicant_id_fkey FOREIGN KEY (applicant_id) REFERENCES applicant(id);


--
-- Name: alumnus_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY alumnus
    ADD CONSTRAINT alumnus_id_fkey FOREIGN KEY (id) REFERENCES faculty_member(id);


--
-- Name: applicant_cv_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY applicant
    ADD CONSTRAINT applicant_cv_id_fkey FOREIGN KEY (cv_id) REFERENCES cv(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: applicant_job_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY applicant
    ADD CONSTRAINT applicant_job_id_fkey FOREIGN KEY (job_id) REFERENCES job(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: award_cv_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY award
    ADD CONSTRAINT award_cv_id_fkey FOREIGN KEY (cv_id) REFERENCES cv(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: company_faculty_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY company
    ADD CONSTRAINT company_faculty_id_fkey FOREIGN KEY (faculty_id) REFERENCES faculty(id);


--
-- Name: company_owner_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY company
    ADD CONSTRAINT company_owner_id_fkey FOREIGN KEY (owner_id) REFERENCES job_owner(id);


--
-- Name: cv_activity_applicant_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY cv_activity
    ADD CONSTRAINT cv_activity_applicant_id_fkey FOREIGN KEY (applicant_id) REFERENCES applicant(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: cv_award_applicant_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY cv_award
    ADD CONSTRAINT cv_award_applicant_id_fkey FOREIGN KEY (applicant_id) REFERENCES applicant(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: faculty_member_cv_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY faculty_member
    ADD CONSTRAINT faculty_member_cv_id_fkey FOREIGN KEY (cv_id) REFERENCES cv(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: faculty_member_faculty_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY faculty_member
    ADD CONSTRAINT faculty_member_faculty_id_fkey FOREIGN KEY (faculty_id) REFERENCES faculty(id);


--
-- Name: full_time_job_job_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY full_time_job
    ADD CONSTRAINT full_time_job_job_id_fkey FOREIGN KEY (job_id) REFERENCES job(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: internship_job_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY internship
    ADD CONSTRAINT internship_job_id_fkey FOREIGN KEY (job_id) REFERENCES job(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: job_faculty_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY job
    ADD CONSTRAINT job_faculty_id_fkey FOREIGN KEY (faculty_id) REFERENCES faculty(id);


--
-- Name: job_owner_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY job
    ADD CONSTRAINT job_owner_id_fkey FOREIGN KEY (owner_id) REFERENCES job_owner(id);


--
-- Name: lecturer_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY lecturer
    ADD CONSTRAINT lecturer_id_fkey FOREIGN KEY (id) REFERENCES faculty_member(id);


--
-- Name: lecturer_owner_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY lecturer
    ADD CONSTRAINT lecturer_owner_id_fkey FOREIGN KEY (owner_id) REFERENCES job_owner(id);


--
-- Name: part_time_job_job_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY part_time_job
    ADD CONSTRAINT part_time_job_job_id_fkey FOREIGN KEY (job_id) REFERENCES job(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: research_project_job_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY research_project
    ADD CONSTRAINT research_project_job_id_fkey FOREIGN KEY (job_id) REFERENCES job(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: student_applicant_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY student
    ADD CONSTRAINT student_applicant_id_fkey FOREIGN KEY (applicant_id) REFERENCES applicant(id);


--
-- Name: student_id_fkey; Type: FK CONSTRAINT; Schema: dbga; Owner: postgres
--

ALTER TABLE ONLY student
    ADD CONSTRAINT student_id_fkey FOREIGN KEY (id) REFERENCES faculty_member(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

