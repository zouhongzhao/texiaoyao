/* Lookups */
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Draft', 'PostStatus', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Published', 'PostStatus', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Archived', 'PostStatus', 3, 3);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Pending Approval', 'CommentStatus', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Approved', 'CommentStatus', 2, 2);

/* Posts */
INSERT INTO tbl_post (title, content, status, create_time, update_time, author_id, tags) VALUES ('Welcome!','This blog system is developed using Yii. It is meant to demonstrate how to use Yii to build a complete real-world application. Complete source code may be found on [Bitbucket](https://bitbucket.org/jwerner/yii-blog-bootstrap).\n\nFeel free to try this system by writing new posts and posting comments.',2,_TS_,_TS_,_USER_ID_,'yii, blog');
INSERT INTO tbl_post (title, content, status, create_time, update_time, author_id, tags) VALUES ('A Test Post', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2,_TS_,_TS_,_USER_ID_,'test');

/* Tags */
INSERT INTO tbl_tag (name) VALUES ('yii');
INSERT INTO tbl_tag (name) VALUES ('blog');
INSERT INTO tbl_tag (name) VALUES ('test');

/* Comments */
INSERT INTO tbl_comment (content, status, create_time, author, email, post_id) VALUES ('This is a test comment.', 2, _TS_, 'John Doe', 'j.doe@example.com', 2);
