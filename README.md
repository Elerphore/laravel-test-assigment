# Hi there.

### Would love to introduce you my test-assigment.

I have deployed this application on my local server, with some port forwarding I accomplish the ability for other people to reach this app
outside of my local network. All of the showing URLs available outside of my local network. 

You able to visit all the links. 

### WEB END POINTS:
````
http://luny-un.ru // create entity view
http://luny-un.ru/update // crud entity view
http://luny-un.ru/crud // crud view 
````
### API END POINTS:
````
http://luny-un.ru // create entity view
http://luny-un.ru/update // crud entity view
http://luny-un.ru/crud // crud view 
````

# NGINX
No need for you to deploy it, but still, here some nginx configs of mine.

```editorconfig
server {
    listen 80;
    server_name luny-un.ru;
    root C:/projects/test-assigment/public;
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    index index.php;
    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }
    error_page 404 /index.php;
                                            
    location ~ \.php$ {
        fastcgi_pass   127.0.0.1:9123;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```
