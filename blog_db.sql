CREATE DATABASE blog_db;

USE blog_db;

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- addion 
ALTER TABLE posts ADD image VARCHAR(255) NOT NULL DEFAULT '\'../uploads/default.jpg\'' AFTER `dislikes`;
ALTER TABLE posts ADD likes bool DEFAULT 0,ADD dislikes bool DEFAULT 0 AFTER author; 

INSERT INTO `posts` (`id`, `title`, `content`, `author`, `dislikes`, `created_at`, `updated_at`, `image`, `likes`) VALUES (NULL, 'title 1', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto quam quas fuga repudiandae voluptatem esse officia tempora tenetur, deserunt laboriosam excepturi sit nostrum ullam natus culpa error possimus architecto vero!', 'author 1', '1', current_timestamp(), current_timestamp(), '../uploads/default.jpg', '0');
INSERT INTO `posts` (`id`, `title`, `content`, `author`, `dislikes`, `created_at`, `updated_at`, `image`, `likes`) VALUES (NULL, 'title 2', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto quam quas fuga repudiandae voluptatem esse officia tempora tenetur, deserunt laboriosam excepturi sit nostrum ullam natus culpa error possimus architecto vero!', 'author 2', '0', current_timestamp(), current_timestamp(), '../uploads/default.jpg', '1');

INSERT INTO `posts` (`id`, `title`, `content`, `author`, `dislikes`, `created_at`, `updated_at`, `image`, `likes`) VALUES (NULL, 'title 3', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto quam quas fuga repudiandae voluptatem esse officia tempora tenetur, deserunt laboriosam excepturi sit nostrum ullam natus culpa error possimus architecto vero!', 'author 3', '1', current_timestamp(), current_timestamp(), '../uploads/default.jpg', '0');
INSERT INTO `posts` (`id`, `title`, `content`, `author`, `dislikes`, `created_at`, `updated_at`, `image`, `likes`) VALUES (NULL, 'title 4', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto quam quas fuga repudiandae voluptatem esse officia tempora tenetur, deserunt laboriosam excepturi sit nostrum ullam natus culpa error possimus architecto vero!', 'author 4', '0', current_timestamp(), current_timestamp(), '../uploads/default.jpg', '1');


INSERT INTO `posts` (`title`, `content`, `author` ) VALUES ('title 5', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto quam quas fuga repudiandae voluptatem esse officia tempora tenetur, deserunt laboriosam excepturi sit nostrum ullam natus culpa error possimus architecto vero!', 'author 5');