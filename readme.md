* Run `composer install`

* Copy .env.example to .env and change the IP and port to the IP address where your nano node is running

* The docker command you need to expose the nano node to the internet:
```
docker run --name NANO -d -p 7075:7075/udp -p 7075:7075 -p [::0]:7076:7076 -v ~:/root nanocurrency/nano
```

* Make sure that the following two rules are in your iptables (you can check this by running `iptables -S`).
replace $YOUR_IP by the IP you want to whitelist 
```
-A INPUT -s $YOUR_IP/32 -p tcp -m tcp --dport 7076 -j ACCEPT
-A INPUT -p tcp -m tcp --dport 7076 -j DROP
```


## Local development
After installing composer and copying the .env file, just run ./develop.sh start and go to http://localhost:80
