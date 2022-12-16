CREATE DATABASE library;

\c library;


CREATE TABLE IF NOT EXISTS books (
	id uuid NOT NULL DEFAULT gen_random_uuid() PRIMARY KEY,
	title varchar NOT NULL,
	author varchar NOT NULL,
	available bool NULL DEFAULT true,
	"year" int4 NULL,
	isbn varchar NOT NULL,
	image varchar NOT NULL DEFAULT 'default.jpg'::character varying,
	checkedout date NULL
);

CREATE INDEX books_author_idx ON public.books USING btree (author);