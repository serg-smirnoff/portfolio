<?php
####################################################################
#                                                                  #
#    PHP dbfConverter V0.9                                         #
#    import data from dbase format to mysql or postgres            #
#    by kroket  Jun.2002                         kroket@bo-bo.si   #
#    http://server.bo-bo.si/php/dbfConverter/                      #
#                                                                  #
####################################################################
#
# V0.9 (01.07.2002)
# Fixed simple bug for inserting field 'Units'
# Added support for conversion to PostgreSQL
#
# V0.8 (24.04.2002) 
# Added all possible field types for xBase table files and
# memo files. I tested this script only with clipper dbf's and dbt's,
# but i think this script should also work with other databases 
# (foxpro dbf's and fpt's).                              
#                                                                  
# V0.7 (17.04.2002) 
# Added support for memo files (dbt). Simply just copy dbt 
# files in directory. Script reads it automaticaly.                
#
# V0.6 (14.04.2002)
# Script now read data direct from file, we can now use it without 
# --enable-dbase option (added in V0.6)                            
#                                                                  
####################################################################
#
#
#
#
# Default in PHP is 30sec for execute the script.
# We need more time
$maxExecTime="0";
#
$Title_name="dbfConverter";
#
# units, if we have more then one dbf files with same name.
# for every $unit[..]="name" we must create directory "name" &
# put dbf files in that directory.
# In mysql database we get dirname_dbffilename table 
#
# example: i have 2 video rentals with same dbf files in 2 cities.
# One city is Vrhnika, second city is Grosuplje. I make directory
# vrhnika & put in movies.dbf file from video-vrhnika & i make another
# directoey grosuplje & put in movies.dbf file from video-grosuplje
# In mysql database i get 2tables: vrhnika_movies & grosuplje_movies
# 
# we can make unlimit number of units
#
$unit[1]="vrhnika";
$unit[2]="grosuplje";
$unit[3]="blabla";
#
# where do we connect to mysql server
#
$sql_host="localhost";
#
# mysql username
#
$sql_user="";
#
# mysql password
#
$sql_pass="";
#
# mysql database name
#
$sql_db="";
#
# which database server we will use
# MySQL or PostgreSQL
# !! case sensitive !!
//$sql_type="PostgreSQL";
$sql_type="MySQL";
#
# This is characters or words which you like to transform data from dbf
# files.
#
$transform["^"]="È";	# this lines down is for transform 852charset
$transform["@"]="Ž";	# to windows1250 (slovenian ;-)
$transform["["]="Š";	# here you can putt entire word
$transform["{"]="š";	# or here
$transform["`"]="ž";	# or here
$transform["~"]="è";	# & you can write more $transforms[]
$transform["hacker"]="cracker";# ;-)
#
# We can put 2 or more dbf files in one mysql table
# example: we have movies.dbf from directory vrhnika & movies.dbf
# from directory grosuplje. As jousual we got vrhnika_movies &
# grosuplje_movies. Here we can setup for both mysql tables to
# go in the same table named movies_all. Ofcourse databases must
# have same field names & types.
#
$transformTableNames["vrhnika_movies"]="movies_all";
$transformTableNames["grosuplje_movies"]="movies_all";
#
# or just change the name of mysql table for blabla_movies
#
$transformTableNames["blabla_movies"]="i_dont_like_that_table_name";
#
# If we group 2 or more dbf files in one mysql table, we need the new
# field called 'unit' or whatever. in this field will be stored string 
# from wich unit(directory) is this row. Default is without this.
# If you enable this option, unit (directory) names must be less
# than 16 characters!!!
#
$needUnitName["movies_all"]=1;
#
# rename mysql Field for units however you want ;-)
$fieldUnitName="Unit";
#
# On default all databases not have primary key id field. Here we can got them.
$needID["i_dont_like_that_table_name"]=1;
$needID["blabla_lala"]=1;
#
# If we doing this first time, mysql tables will be created, if we updating
# existing mysql tables, we can update on a few ways:
#
# $updateMode[]=1	Delete all data in table & insert new data from file.
#			If we have defined Field 'Unit' (when we have more then one
#			dbfs in table), this seting delete only data from this unit.
#			example: if you updating only vrhnika in movies_all, all data
#			from database which contains Unit="VRHNIKA" will be deleted & new
#			data from vrhnika will be inserted. In this case we can't set
#			ID fields, becouse ID will grow for every update!
#
# $updateMode[]=2	Insert only newer rows. Preety good if you just add new records
#			in the database in your dos program! This is much faster, becouse
#			we insert only newer records from dbf file.
# default is 1
#
$updateMode["movies_all"]=1;
$updateMode["i_dont_like_that_table_name"]=2;
#
# we can make some conditions whitch data will be deleted from mysql table
# if we have some data in dbf whitch we dont wont in mysql.
# Stupid way, i know, but if we want this in config file...
# syntax is $data_delete["mysql_table_name"]="Field_name operator value";
# we can write anything which in mysql query come after WHERE!
# example: $data_delete["movies_all"]="`St_kasete`>11 AND `St_kasete`<1500 AND (`Tema`='PORNO' OR `Tema`='AKC.')";
#
$data_delete["movies_all"]="`St_kasete` <= 11";
