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


SET search_path = dbga, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

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
    id integer NOT NULL
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
    gender character(1)
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
-- Data for Name: alumnus; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY alumnus (id, applicant_id, enroll_year, grad_year) FROM stdin;
2	\N	2006	2012
\.


--
-- Data for Name: applicant; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY applicant (id) FROM stdin;
\.


--
-- Name: applicant_id_seq; Type: SEQUENCE SET; Schema: dbga; Owner: postgres
--

SELECT pg_catalog.setval('applicant_id_seq', 1, false);


--
-- Data for Name: company; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY company (id, name, email, owner_id, password, faculty_id) FROM stdin;
1	Google	contact@gmail.com	1	password	1
\.


--
-- Name: company_id_seq; Type: SEQUENCE SET; Schema: dbga; Owner: postgres
--

SELECT pg_catalog.setval('company_id_seq', 1, false);


--
-- Data for Name: faculty; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY faculty (id, name) FROM stdin;
1	Faculty of Computer Science
\.


--
-- Name: faculty_id_seq; Type: SEQUENCE SET; Schema: dbga; Owner: postgres
--

SELECT pg_catalog.setval('faculty_id_seq', 1, true);


--
-- Data for Name: faculty_member; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY faculty_member (id, email, password, fname, lname, faculty_id, gender) FROM stdin;
1	raibima.imam@ui.ac.id	password	Raibima	Putra	1	m
2	nuryahya.prasetyo@ui.ac.id	password	Nuryahya	Prasetyo	1	m
3	bondry@gmail.com	password	Handri	Santoso	1	m
\.


--
-- Name: faculty_member_id_seq; Type: SEQUENCE SET; Schema: dbga; Owner: postgres
--

SELECT pg_catalog.setval('faculty_member_id_seq', 1, false);


--
-- Data for Name: full_time_job; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY full_time_job (job_id, working_hours) FROM stdin;
1	\N
\.


--
-- Data for Name: internship; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY internship (job_id, duration) FROM stdin;
2	\N
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

SELECT pg_catalog.setval('job_id_seq', 4, true);


--
-- Data for Name: job_owner; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY job_owner (id) FROM stdin;
1
2
\.


--
-- Name: job_owner_id_seq; Type: SEQUENCE SET; Schema: dbga; Owner: postgres
--

SELECT pg_catalog.setval('job_owner_id_seq', 1, false);


--
-- Data for Name: lecturer; Type: TABLE DATA; Schema: dbga; Owner: postgres
--

COPY lecturer (id, owner_id, salary, bank_account) FROM stdin;
3	2	\N	\N
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
1	u	\N	2012
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
-- PostgreSQL database dump complete
--

