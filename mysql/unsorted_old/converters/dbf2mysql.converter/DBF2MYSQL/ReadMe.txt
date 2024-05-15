
                              DBF2MySQL
                        Version 1.02 freeware
                  Copyright (C) by Alexander Eltsyn 
                          E-mail: ae@nica.ru
                     WWW: http://www.nica.ru/~ae

             Thanks to Johan Ekenberg <johan@ekenberg.nu>
            for the fixing problem with codepage conversion


  The program is also the subject of following copyrights:

  - Copyright (C) T.c.X. DataKonsult AB
  - Copyright (C) 1998 Justin P. Yunke <yunke@productivity.org>
  - Copyright (C) 1998 Ken Kyler
  - Copyright (C) Bob Silva <bsilva@umesd.k12.or.us>
    
  
                            WHAT IS THIS?

     DBF2MySQL is Win32 application to transfer data from FoxPro .DBF
files into MySQL server. To use this program you need an TCP/IP stack
installed and configured.


                            KEY FEATURES:

  * it requires no ODBC or other special clients to access MySQL and .DBF 
    tables;
  * editable "CREATE TABLE" queries;
  * column names substitution/exclusion;
  * "batch" table transfer mode; 
  * .dbf tables preview


                         BATCH TABLE PROCESSING

     If you need to transfer periodically a constant set of .dbf tables, 
this feature is for you. First of all, the "batch script" is to be created.
Then you may give it as a command line argument for DBF2MySQL.exe. You may 
also specify in command line connection details

DBF2MySQL <script name> [<host> <port> <database> <user> [<password>]]




                      BATCH SCRIPT FORMAT DESCRIPTION

     Each line of the batch script contains instruction for one .DBF table. 

Script line format (all parameters may be quoted with `"`): 

 <dbf_file_name>,<mysql_table_name>,<ReCreate>,<delete_rows>,<skip_codepage_id_check>,<TargetCP>{,<dbf_field_name>=<mysql_field_name>}

 Where:
  <dbf_file_name>      			- file name to transfer data from
  <mysql_table_name>   			- table name to transfer data to
  <ReCreate>           			- Recreate MySQL table structure. Possible values:
                       			  0: leave table structure unchanged
                       			  1: drop table and create new trable structure
                       			     according to .DBF file.
  <delete_rows>        			- empty table before data transfer. Values:
                       			  0: append .DBF data into table
                       			  1: delete all existing data before data transfer
  <skip_codepage_id_check>		- Skip codepage ID check. Values:
					  0: Do codepage ID check in DBF file
					  1: Skip codepage check
  <TargetCP>           			- Target code page. Values:
                       			  0: Current Windows codepage
                       			  1: Russian KOI-8
                       			  2: Russian MS-DOS (866)
                       			  3: OEM
  <dbf_field_name>=<mysql_field_name>	- associate DBF field name 
                        		  with mysql field name. Empty value of
		                          <mysql_filed_name> means, that field should 
                		          not be transfered


Example of script lines:

".\db\abit.dbf", abit, 1, 1, 1, 0, lock=""
db\stud.dbf, stud, 0, 1, 0, 0, "Field"="Fld"


                  "Skip codepage ID check" EXPLANATION

   This is a quick hack added to fix a problem occuring with certain 
language settings. For instance, to make dbf2mysql translate extended 
Swedish characters correctly, "Skip codepage ID check" should be set 
to 1, and "Current Windows Codepage" should be used, provided you're 
working in a Swedish Windows environment. If you have trouble with
strange characters showing up in your MySQL tables, experiment with 
these settings.


                                PROBLEMS

1. Problem with tables contains large MEMO or GENERAL data.

   Don't forget to increase value of "max_allowed_packet" variable to 
transfer large BLOB fields. Packet size should be large enough to store
INSERT query with all transfered fields data including BLOB's. 
The default value is 65536 bytes. See MySQL manual for details. 

2. MEMO's codepage conversion.
   There is some difference betwen MEMO and GENERAL datatype transfering:

 .DBF data type     Default MySQL data type     Codepage conversion
   MEMO                 MEDIUMTEXT             As you choose in wizard
   GENERAL              MEDIUMBLOB                     No



                                 HISTORY

1.02 Release:
  - batch script <ReCreate> flag bug was fixed.

1.01 Release:
  - "Skip codepage ID check" was added by Johan Ekenberg

1.0 Release:
  - Fixed bug with "Date" data type transfer
  - Fixed bug with MEMO field transfering
  - Memo data is now searched in .fpt in .dbt files
  - Default MySQL column types for MEMO and GENERAL are 
    MEDIUMTEXT and MEDIUMBLOB correspondingly
  - Codepage for GENERAL datatype is not changing
  - Added TargetCP parameter in batch script
  - Some "cosmetic" changes

1.0 a:
  First available implementation

