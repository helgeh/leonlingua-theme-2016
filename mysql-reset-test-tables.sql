# Remove existing test-tables
DROP TABLE testll_commentmeta;
DROP TABLE testll_comments;
DROP TABLE testll_links;
DROP TABLE testll_options;
DROP TABLE testll_postmeta;
DROP TABLE testll_posts;
DROP TABLE testll_term_relationships;
DROP TABLE testll_term_taxonomy;
DROP TABLE testll_termmeta;
DROP TABLE testll_terms;
DROP TABLE testll_usermeta;
DROP TABLE testll_users;

# New test-tables
CREATE TABLE testll_commentmeta LIKE ll_commentmeta;
CREATE TABLE testll_comments LIKE ll_comments;
CREATE TABLE testll_links LIKE ll_links;
CREATE TABLE testll_options LIKE ll_options;
CREATE TABLE testll_postmeta LIKE ll_postmeta;
CREATE TABLE testll_posts LIKE ll_posts;
CREATE TABLE testll_term_relationships LIKE ll_term_relationships;
CREATE TABLE testll_term_taxonomy LIKE ll_term_taxonomy;
CREATE TABLE testll_termmeta LIKE ll_termmeta;
CREATE TABLE testll_terms LIKE ll_terms;
CREATE TABLE testll_usermeta LIKE ll_usermeta;
CREATE TABLE testll_users LIKE ll_users;

# Copy all data from prod-tables
INSERT testll_commentmeta SELECT * FROM ll_commentmeta;
INSERT testll_comments SELECT * FROM ll_comments;
INSERT testll_links SELECT * FROM ll_links;
INSERT testll_options SELECT * FROM ll_options;
INSERT testll_postmeta SELECT * FROM ll_postmeta;
INSERT testll_posts SELECT * FROM ll_posts;
INSERT testll_term_relationships SELECT * FROM ll_term_relationships;
INSERT testll_term_taxonomy SELECT * FROM ll_term_taxonomy;
INSERT testll_termmeta SELECT * FROM ll_termmeta;
INSERT testll_terms SELECT * FROM ll_terms;
INSERT testll_usermeta SELECT * FROM ll_usermeta;
INSERT testll_users SELECT * FROM ll_users;

# Change domain
UPDATE testll_options SET option_value = replace(option_value, 'http://www.leonlingua.com', 'http://test.leonlingua.com') WHERE option_name = 'home' OR option_name = 'siteurl';
UPDATE testll_posts SET guid = replace(guid, 'http://www.leonlingua.com','http://test.leonlingua.com');
UPDATE testll_posts SET post_content = replace(post_content, 'http://www.leonlingua.com', 'http://test.leonlingua.com');
UPDATE testll_postmeta SET meta_value = replace(meta_value,'http://www.leonlingua.com','http://test.leonlingua.com');

# Change other settings
UPDATE `testll_options` SET `option_name` = REPLACE( `option_name` , 'll_', 'testll_' );
UPDATE `testll_usermeta` SET `meta_key` = REPLACE( `meta_key` , 'll_', 'testll_' );

# Set dummy-sitename to indicate test environment
update testll_options set option_value = 'Leøn Linguå' where option_name = 'blogname';

