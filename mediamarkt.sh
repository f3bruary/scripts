#!/bin/bash

# Check MediaMarkt product page for price changes, and notify through Pushover

# Requires NPM package: structured-data-testing-tool
# sudo npm i structured-data-testing-tool -g

# Requires Pushover.net account (and you need to create an 'app' for curl)

url=''              #Mediamarkt product URL
apptoken=''         #Pushover App Token
usertoken=''        #Pushover User Token
productname=''      #Product name (or whatever you want the title to be)
usualprice=''       #Usual price

sdtt --schemas Product --url $url -i | grep -A 1 "offers.price" -w | cut -d ' ' -f10 | tail -n 1 > ~/price.txt

price=$(cat ~/price.txt)

if [[ $price == $usualprice ]]
then
    curl -s --form-string "title=$productname" --form-string "token=$apptoken" --form-string "user=$usertoken" --form-string "message=Price Unchanged :(
    Current Price:€ $price" https://api.pushover.net/1/messages.json

else
    curl -s --form-string "title=$productname" --form-string "token=$apptoken" --form-string "user=$usertoken" --form-string "message=Price Changed :)
    New Price:€ $price" https://api.pushover.net/1/messages.json
fi
